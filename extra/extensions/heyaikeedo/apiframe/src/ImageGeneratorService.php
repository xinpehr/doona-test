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
use Ai\Domain\ValueObjects\Progress;

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
        error_log("APIFrame: Received params: " . json_encode($params));
        
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
            error_log("APIFrame: Mode overridden from params: " . $mode);
        }
        error_log("APIFrame: Final mode: " . $mode);

        // Extract aspect ratio if provided
        $aspectRatio = null;
        if (isset($params['aspect_ratio'])) {
            $aspectRatio = $params['aspect_ratio'];
            error_log("APIFrame: Aspect ratio from params: " . $aspectRatio);
        }
        error_log("APIFrame: Final aspect ratio: " . ($aspectRatio ?? 'null'));

        // Prepare prompt with style if provided
        $prompt = $params['prompt'];
        $originalPrompt = $prompt;
        if (isset($params['style']) && !empty($params['style'])) {
            $style = $params['style'];
            error_log("APIFrame: Style from params: " . $style);
            switch ($style) {
                case 'raw':
                    $prompt .= ' --style raw';
                    break;
                case 'natural':
                    $prompt .= ', natural style';
                    break;
                case 'artistic':
                    $prompt .= ', artistic style';
                    break;
                case 'cinematic':
                    $prompt .= ', cinematic style';
                    break;
            }
        }
        error_log("APIFrame: Original prompt: " . $originalPrompt);
        error_log("APIFrame: Final prompt: " . $prompt);

        try {
            // Send imagine request to APIFrame
            $response = $this->client->imagine(
                $prompt,
                $mode,
                $aspectRatio
            );

            if (!isset($response['task_id'])) {
                throw new DomainException('Invalid response from APIFrame API');
            }

            // Store task information in entity metadata
            $entity->addMeta('apiframe_task_id', $response['task_id']);
            $entity->addMeta('apiframe_mode', $mode);
            $entity->addMeta('apiframe_status', 'pending');
            $entity->addMeta('apiframe_created_at', time());

            error_log("APIFrame: Task submitted successfully. Entity ready for background processing");
            
            // Entity stays in PROCESSING state for background polling
            // Background job will handle the polling and completion

        } catch (\Exception $e) {
            error_log("APIFrame: Exception occurred: " . $e->getMessage());
            error_log("APIFrame: Exception class: " . get_class($e));
            error_log("APIFrame: Exception trace: " . $e->getTraceAsString());
            throw new DomainException('Failed to generate image: ' . $e->getMessage());
        }

        error_log("APIFrame: Returning entity in PROCESSING state for background processing");
        error_log("APIFrame: Entity ID: " . $entity->getId()->getValue());
        error_log("APIFrame: Task ID: " . $response['task_id']);
        
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
     * Public method for background processing to check task status
     */
    public function checkTaskStatus(ImageEntity $entity): void
    {
        $taskId = $entity->getMeta('apiframe_task_id');
        if (!$taskId) {
            error_log("APIFrame: No task ID found for entity: " . $entity->getId()->getValue());
            return;
        }

        try {
            $result = $this->client->fetch($taskId);
            error_log("APIFrame: Background check - Task: " . $taskId . ", Response: " . json_encode($result));
            
            if (!isset($result['status'])) {
                error_log("APIFrame: No status in response");
                return;
            }
            
            $status = $result['status'];
            $entity->addMeta('apiframe_status', $status);
            
            switch ($status) {
                case 'completed':
                case 'finished':
                    error_log("APIFrame: Background processing - Task completed!");
                    $this->handleCompletedTask($entity, $result);
                    break;
                    
                case 'failed':
                case 'error':
                    error_log("APIFrame: Background processing - Task failed!");
                    $this->handleFailedTask($entity, $result);
                    break;
                    
                case 'processing':
                case 'pending':
                case 'queued':
                case 'staged':
                case 'starting':
                case 'submitted':
                    $progress = $result['percentage'] ?? null;
                    error_log("APIFrame: Background processing - Still processing... Progress: " . ($progress ?? 'unknown'));
                    $entity->addMeta('apiframe_progress', $progress);
                    
                    // Set progress in entity for frontend display
                    if ($progress !== null && is_numeric($progress)) {
                        $entity->setProgress(new Progress((int) $progress));
                    }
                    break;
                    
                default:
                    error_log("APIFrame: Background processing - Unknown status: " . $status);
                    break;
            }
            
        } catch (\Exception $e) {
            error_log("APIFrame: Background processing error: " . $e->getMessage());
        }
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
        
        $imageUrl = null;
        
        // Try image_urls array first (most common)
        if (isset($result['image_urls']) && is_array($result['image_urls']) && !empty($result['image_urls'])) {
            $imageUrl = $result['image_urls'][0]; // Use first image
            error_log("APIFrame: Found image_urls, using first: " . $imageUrl);
        }
        // Try single image_url
        elseif (isset($result['image_url'])) {
            $imageUrl = $result['image_url'];
            error_log("APIFrame: Found single image_url: " . $imageUrl);
        }
        // Try original_image_url (grid)
        elseif (isset($result['original_image_url'])) {
            $imageUrl = $result['original_image_url'];
            error_log("APIFrame: Found original_image_url: " . $imageUrl);
        }
        else {
            error_log("APIFrame: No image URLs found in completed response: " . json_encode($result));
            $entity->addMeta('apiframe_error', 'No image URLs in completed response');
            $entity->setState(State::FAILED);
            return;
        }
        
        // Process the image
        $this->processImageFromUrl($entity, $imageUrl);
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




}
