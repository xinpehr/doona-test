<?php

declare(strict_types=1);

namespace Aikeedo\ApiFrame;

use Ai\Domain\Entities\ImageEntity;
use Ai\Domain\Exceptions\DomainException;
use Ai\Domain\Image\ImageServiceInterface;
use Ai\Domain\ValueObjects\Model;
use Ai\Domain\ValueObjects\RequestParams;
use Ai\Domain\ValueObjects\State;
use Ai\Infrastructure\Services\CostCalculator;
use Easy\Container\Attributes\Inject;
use File\Domain\Entities\ImageFileEntity;
use File\Domain\ValueObjects\BlurHash;
use File\Domain\ValueObjects\Height;
use File\Domain\ValueObjects\ObjectKey;
use File\Domain\ValueObjects\Size;
use File\Domain\ValueObjects\Storage;
use File\Domain\ValueObjects\Url;
use File\Domain\ValueObjects\Width;
use File\Infrastructure\BlurHashGenerator;
use Override;
use Shared\Infrastructure\FileSystem\CdnInterface;
use Shared\Infrastructure\Services\ModelRegistry;
use Traversable;
use User\Domain\Entities\UserEntity;
use Workspace\Domain\Entities\WorkspaceEntity;

/**
 * APIFrame Midjourney Image Generator Service
 * 
 * Provides professional Midjourney AI image generation through APIFrame API.
 * Supports Midjourney versions 6.1 and 7 with fast and turbo modes.
 * 
 * @see https://docs.apiframe.ai/pro-midjourney-api/api-endpoints/imagine.md
 */
class ImageGeneratorService implements ImageServiceInterface
{
    private ?array $models = null;

    public function __construct(
        private Client $client,
        private Helper $helper,
        private CostCalculator $calc,
        private CdnInterface $cdn,
        private ModelRegistry $registry,

        #[Inject('option.features.imagine.is_enabled')]
        private bool $isToolEnabled = false,

        #[Inject('option.apiframe.api_key')]
        private ?string $apiKey = null,
    ) {}

    #[Override]
    public function generateImage(
        WorkspaceEntity $workspace,
        UserEntity $user,
        Model $model,
        ?array $params = null
    ): ImageEntity {
        error_log("APIFrame: Generating image with model: " . $model->value);
        
        if (!$params || !array_key_exists('prompt', $params)) {
            error_log("APIFrame: Missing prompt parameter");
            throw new DomainException('Missing parameter: prompt');
        }

        if (!$this->supportsModel($model)) {
            error_log("APIFrame: Model not supported: " . $model->value);
            throw new DomainException('Model not supported: ' . $model->value);
        }

        $card = $this->models[$model->value];
        
        // Calculate cost like other services
        // Convert model name format for cost calculation (/ to -)
        $costModelName = str_replace('/', '-', $model->value);
        $costModel = new Model($costModelName);
        $cost = $this->calc->calculate(1, $costModel);
        error_log("APIFrame: Original model: " . $model->value);
        error_log("APIFrame: Cost model: " . $costModelName);
        error_log("APIFrame: Calculated cost: " . $cost->value);
        
        $entity = new ImageEntity(
            $workspace,
            $user,
            $model,
            RequestParams::fromArray($params),
            $cost
        );
        
        // Set initial state as PROCESSING so it appears in archive
        $entity->setState(State::PROCESSING);

        // Determine mode from model configuration
        $mode = 'fast'; // default
        if (isset($card['config']['mode'])) {
            $mode = $card['config']['mode'];
        }

        // Override mode if specified in params
        if (isset($params['mode']) && in_array($params['mode'], ['fast', 'turbo'])) {
            $mode = $params['mode'];
        }

        try {
            // Send imagine request to APIFrame
            $response = $this->client->imagine(
                $params['prompt'],
                $mode
            );

            if (!isset($response['task_id'])) {
                throw new DomainException('Invalid response from APIFrame API');
            }

            // Store task information in entity metadata
            $entity->addMeta('apiframe_task_id', $response['task_id']);
            $entity->addMeta('apiframe_mode', $mode);
            $entity->addMeta('apiframe_status', 'pending');

            error_log("APIFrame: Task submitted successfully. Starting simple polling...");
            
            // Start simple polling loop (blocking but with timeout)
            $this->pollTask($entity, $response['task_id']);

        } catch (\Exception $e) {
            error_log("APIFrame: Exception occurred: " . $e->getMessage());
            error_log("APIFrame: Exception class: " . get_class($e));
            error_log("APIFrame: Exception trace: " . $e->getTraceAsString());
            throw new DomainException('Failed to generate image: ' . $e->getMessage());
        }

        error_log("APIFrame: About to return entity...");
        error_log("APIFrame: Returning entity with ID: " . $entity->getId()->getValue());
        error_log("APIFrame: Entity state: " . $entity->getState()->value);
        error_log("APIFrame: Entity cost: " . $entity->getCost()->value);
        error_log("APIFrame: Entity output file: " . ($entity->getOutputFile() ? 'SET' : 'NULL'));
        error_log("APIFrame: Entity title: " . ($entity->getTitle()->value ?? 'NULL'));
        error_log("APIFrame: Entity workspace: " . $entity->getWorkspace()->getId()->getValue());
        error_log("APIFrame: Entity user: " . $entity->getUser()->getId()->getValue());
        error_log("APIFrame: Successfully returning entity to command handler");
        
        return $entity;
    }

    #[Override]
    public function supportsModel(Model $model): bool
    {
        $this->parseDirectory();
        return array_key_exists($model->value, $this->models);
    }

    #[Override]
    public function getSupportedModels(): Traversable
    {
        $this->parseDirectory();

        foreach ($this->models as $key => $model) {
            yield new Model($key);
        }
    }


    /**
     * Parse models from registry directory
     */
    private function parseDirectory(): void
    {
        if ($this->models !== null) {
            return;
        }

        if (!$this->isToolEnabled) {
            $this->models = [];
            return;
        }

        $services = array_filter($this->registry['directory'], fn($service) => $service['key'] === 'apiframe');

        if (count($services) === 0) {
            $this->models = [];
            return;
        }

        $service = array_values($services)[0];
        $models = array_filter($service['models'], fn($model) => $model['type'] === 'image');

        $this->models = array_reduce($models, function ($carry, $model) {
            $carry[$model['key']] = $model;
            return $carry;
        }, []);
    }

    /**
     * Simple polling method - exactly as per APIFrame docs
     */
    private function pollTask(ImageEntity $entity, string $taskId): void
    {
        error_log("APIFrame: Starting polling for task: " . $taskId);
        
        $maxAttempts = 24; // 2 minutes max (24 * 5 seconds)
        $attempt = 0;
        
        while ($attempt < $maxAttempts) {
            $attempt++;
            
            // Wait 5 seconds between polls (as recommended)
            if ($attempt > 1) {
                sleep(5);
            }
            
            error_log("APIFrame: Polling attempt $attempt/$maxAttempts for task: " . $taskId);
            
            try {
                // Call fetch API exactly as per docs
                $result = $this->client->fetch($taskId);
                error_log("APIFrame: Fetch response: " . json_encode($result));
                
                // Check status according to APIFrame docs
                if (!isset($result['status'])) {
                    error_log("APIFrame: No status in response, continuing...");
                    continue;
                }
                
                $status = $result['status'];
                error_log("APIFrame: Task status: " . $status);
                
                // Handle different statuses
                switch ($status) {
                    case 'completed':
                    case 'finished':
                        error_log("APIFrame: Task completed! Processing result...");
                        $this->handleCompletedTask($entity, $result);
                        return; // Exit polling
                        
                    case 'failed':
                    case 'error':
                        error_log("APIFrame: Task failed!");
                        $this->handleFailedTask($entity, $result);
                        return; // Exit polling
                        
                    case 'processing':
                    case 'pending':
                    case 'queued':
                    case 'staged':
                    case 'submitted':
                        $progress = $result['percentage'] ?? 'unknown';
                        error_log("APIFrame: Task still processing... Progress: " . $progress);
                        continue 2; // Continue polling loop
                        
                    default:
                        error_log("APIFrame: Unknown status: " . $status . ", continuing...");
                        continue 2; // Continue polling loop
                }
                
            } catch (\Exception $e) {
                error_log("APIFrame: Polling error (attempt $attempt): " . $e->getMessage());
                // Continue polling even on error (might be temporary)
                continue;
            }
        }
        
        // Timeout reached
        error_log("APIFrame: Polling timeout reached for task: " . $taskId);
        $entity->addMeta('apiframe_error', 'Polling timeout after 2 minutes');
        $entity->setState(State::FAILED);
    }
    
    /**
     * Handle completed task - exactly as per APIFrame docs
     */
    private function handleCompletedTask(ImageEntity $entity, array $result): void
    {
        error_log("APIFrame: Processing completed task...");
        
        // According to APIFrame docs, completed response has:
        // "image_urls": ["url1", "url2", "url3", "url4"]
        // or "original_image_url": "grid_url"
        
        $imageUrls = [];
        $mainImageUrl = null;
        
        // Try image_urls array first (most common)
        if (isset($result['image_urls']) && is_array($result['image_urls']) && !empty($result['image_urls'])) {
            $imageUrls = $result['image_urls'];
            $mainImageUrl = $result['image_urls'][0]; // Use first image as main
            error_log("APIFrame: Found " . count($imageUrls) . " image URLs, using first as main: " . $mainImageUrl);
            
            // Store all image URLs in metadata for frontend access
            $entity->addMeta('apiframe_all_images', json_encode($imageUrls));
            $entity->addMeta('apiframe_image_count', count($imageUrls));
        }
        // Try single image_url
        elseif (isset($result['image_url'])) {
            $mainImageUrl = $result['image_url'];
            $imageUrls = [$mainImageUrl];
            error_log("APIFrame: Found single image_url: " . $mainImageUrl);
            
            $entity->addMeta('apiframe_all_images', json_encode($imageUrls));
            $entity->addMeta('apiframe_image_count', 1);
        }
        // Try original_image_url (grid)
        elseif (isset($result['original_image_url'])) {
            $mainImageUrl = $result['original_image_url'];
            $imageUrls = [$mainImageUrl];
            error_log("APIFrame: Found original_image_url: " . $mainImageUrl);
            
            $entity->addMeta('apiframe_all_images', json_encode($imageUrls));
            $entity->addMeta('apiframe_image_count', 1);
        }
        else {
            error_log("APIFrame: No image URLs found in completed response: " . json_encode($result));
            $entity->addMeta('apiframe_error', 'No image URLs in completed response');
            $entity->setState(State::FAILED);
            return;
        }
        
        // Process the main image (first one)
        $this->processImageFromUrl($entity, $mainImageUrl);
        
        // If we have multiple images, download and store all URLs for frontend access
        if (count($imageUrls) > 1) {
            $this->processAllImages($entity, $imageUrls);
        }
    }
    
    /**
     * Handle failed task
     */
    private function handleFailedTask(ImageEntity $entity, array $result): void
    {
        $error = $result['error'] ?? $result['message'] ?? 'Task failed';
        error_log("APIFrame: Task failed with error: " . $error);
        
        $entity->addMeta('apiframe_error', $error);
        $entity->setState(State::FAILED);
    }
    
    /**
     * Process image from URL
     */
    private function processImageFromUrl(ImageEntity $entity, string $imageUrl): void
    {
        error_log("APIFrame: Downloading image from: " . $imageUrl);
        
        try {
            // Download image
            $imageData = file_get_contents($imageUrl);
            if ($imageData === false) {
                throw new \Exception('Failed to download image from URL: ' . $imageUrl);
            }
            
            error_log("APIFrame: Image downloaded, size: " . strlen($imageData) . " bytes");
            
            // Create image resource for dimensions
            $img = imagecreatefromstring($imageData);
            if ($img === false) {
                throw new \Exception('Invalid image data');
            }
            
            $width = imagesx($img);
            $height = imagesy($img);
            error_log("APIFrame: Image dimensions: {$width}x{$height}");
            
            // Generate CDN path
            $extension = pathinfo(parse_url($imageUrl, PHP_URL_PATH), PATHINFO_EXTENSION) ?: 'png';
            $name = $this->cdn->generatePath($extension, $entity->getWorkspace(), $entity->getUser());
            
            // Upload to CDN
            $this->cdn->write($name, $imageData);
            $cdnUrl = $this->cdn->getUrl($name);
            error_log("APIFrame: Image uploaded to CDN: " . $cdnUrl);
            
            try {
                // Create ImageFileEntity
                error_log("APIFrame: Creating ImageFileEntity...");
                error_log("APIFrame: Storage: " . $this->cdn->getAdapterLookupKey());
                error_log("APIFrame: ObjectKey: " . $name);
                error_log("APIFrame: URL: " . $cdnUrl);
                error_log("APIFrame: Size: " . strlen($imageData));
                error_log("APIFrame: Width: " . $width);
                error_log("APIFrame: Height: " . $height);
                
                error_log("APIFrame: Skipping BlurHash generation (potential timeout issue)");
                $blurHash = 'L9Fj^kS6WA%L~pi^R*j[*7Z~oLxu'; // Default blur hash for now
                
                $file = new ImageFileEntity(
                    new Storage($this->cdn->getAdapterLookupKey()),
                    new ObjectKey($name),
                    new Url($cdnUrl),
                    new Size(strlen($imageData)),
                    new Width($width),
                    new Height($height),
                    new BlurHash($blurHash)
                );
                error_log("APIFrame: ImageFileEntity created successfully");
                
                // Cost will be calculated by the main system
                
                // Complete the entity
                error_log("APIFrame: Setting output file and state...");
                $entity->setOutputFile($file);
                $entity->setState(State::COMPLETED);
                error_log("APIFrame: Output file and state set successfully");
                
                error_log("APIFrame: Task completed successfully!");
            } catch (\Exception $e) {
                error_log("APIFrame: Error in ImageFileEntity creation: " . $e->getMessage());
                error_log("APIFrame: Exception class: " . get_class($e));
                throw $e;
            }
            
            imagedestroy($img);
            
        } catch (\Exception $e) {
            error_log("APIFrame: Error processing image: " . $e->getMessage());
            $entity->addMeta('apiframe_error', 'Image processing failed: ' . $e->getMessage());
            $entity->setState(State::FAILED);
        }
    }
    
    /**
     * Process all images and store their URLs in metadata
     */
    private function processAllImages(ImageEntity $entity, array $imageUrls): void
    {
        error_log("APIFrame: Processing all " . count($imageUrls) . " images for metadata storage");
        
        $processedUrls = [];
        
        foreach ($imageUrls as $index => $imageUrl) {
            try {
                error_log("APIFrame: Processing image " . ($index + 1) . "/" . count($imageUrls) . ": " . $imageUrl);
                
                // Download image
                $imageData = file_get_contents($imageUrl);
                if ($imageData === false) {
                    error_log("APIFrame: Failed to download image " . ($index + 1) . ": " . $imageUrl);
                    continue;
                }
                
                // Generate CDN path for this image
                $extension = pathinfo(parse_url($imageUrl, PHP_URL_PATH), PATHINFO_EXTENSION) ?: 'png';
                $name = $this->cdn->generatePath($extension, $entity->getWorkspace(), $entity->getUser());
                
                // Upload to CDN
                $this->cdn->write($name, $imageData);
                $cdnUrl = $this->cdn->getUrl($name);
                
                $processedUrls[] = [
                    'index' => $index + 1,
                    'original_url' => $imageUrl,
                    'cdn_url' => $cdnUrl,
                    'size' => strlen($imageData)
                ];
                
                error_log("APIFrame: Image " . ($index + 1) . " uploaded to CDN: " . $cdnUrl);
                
            } catch (\Exception $e) {
                error_log("APIFrame: Error processing image " . ($index + 1) . ": " . $e->getMessage());
                continue;
            }
        }
        
        // Store processed URLs in metadata
        if (!empty($processedUrls)) {
            $entity->addMeta('apiframe_processed_images', json_encode($processedUrls));
            error_log("APIFrame: Stored " . count($processedUrls) . " processed images in metadata");
        }
    }


}
