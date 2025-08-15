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
use File\Infrastructure\BlurhashGenerator;
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
 * Uses synchronous polling for reliable image generation.
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
        error_log("APIFrame: Starting synchronous image generation with model: " . $model->value);
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
        error_log("APIFrame: Calculated cost: " . $cost->value);

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

        // Extract aspect ratio if provided
        $aspectRatio = null;
        if (isset($params['aspect_ratio'])) {
            $aspectRatio = $params['aspect_ratio'];
        }

        // Prepare prompt with style if provided
        $prompt = $params['prompt'];
        $originalPrompt = $prompt;
        if (isset($params['style']) && !empty($params['style'])) {
            $style = $params['style'];
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
        error_log("APIFrame: Final prompt: " . $prompt);

        try {
            // Submit task to APIFrame
            error_log("APIFrame: Submitting imagine request");
            $response = $this->client->imagine($prompt, $mode, $aspectRatio);

            if (!isset($response['task_id'])) {
                throw new DomainException('Invalid response from APIFrame API - no task_id');
            }

            $taskId = $response['task_id'];
            error_log("APIFrame: Task submitted successfully, task_id: " . $taskId);

            // Create entity in processing state
            $entity = new ImageEntity(
                $workspace,
                $user,
                $model,
                RequestParams::fromArray($params),
                $cost
            );
            
            $entity->setState(State::PROCESSING);
            error_log("APIFrame: Entity created in PROCESSING state");

            // Start synchronous polling
            $imageUrl = $this->pollTaskUntilCompletion($taskId, $entity);
            
            // Process the completed image
            $this->processImageFromUrl($entity, $imageUrl);
            
            error_log("APIFrame: Image generation completed successfully");
            return $entity;

        } catch (\Exception $e) {
            error_log("APIFrame: Exception occurred: " . $e->getMessage());
            throw new DomainException('Failed to generate image: ' . $e->getMessage());
        }
    }

    /**
     * Poll the APIFrame API until task completion
     */
    private function pollTaskUntilCompletion(string $taskId, ImageEntity $entity): string
    {
        $maxAttempts = 60; // 5 minutes at 5-second intervals
        $attempts = 0;
        
        error_log("APIFrame: Starting polling for task: " . $taskId);
        
        while ($attempts < $maxAttempts) {
            $attempts++;
            
            try {
                $result = $this->client->fetch($taskId);
                error_log("APIFrame: Polling attempt {$attempts}, response: " . json_encode($result));
                
                if (!isset($result['status'])) {
                    error_log("APIFrame: No status in response, retrying...");
                    sleep(5);
                    continue;
                }
                
                $status = $result['status'];
                
                switch ($status) {
                    case 'completed':
                    case 'finished':
                        error_log("APIFrame: Task completed!");
                        return $this->extractImageUrl($result);
                        
                    case 'failed':
                    case 'error':
                        $error = $result['error'] ?? $result['message'] ?? 'Task failed';
                        error_log("APIFrame: Task failed: " . $error);
                        throw new DomainException('Image generation failed: ' . $error);
                        
                    case 'processing':
                    case 'pending':
                    case 'queued':
                    case 'staged':
                    case 'starting':
                    case 'submitted':
                        $progress = $result['percentage'] ?? 0;
                        error_log("APIFrame: Still processing... Progress: " . $progress . "%");
                        
                        // Update progress (optional, since this is synchronous)
                        if ($progress && is_numeric($progress)) {
                            $entity->setProgress(new \Ai\Domain\ValueObjects\Progress((int) $progress));
                        }
                        
                        sleep(5); // Wait 5 seconds before next poll
                        break;
                        
                    default:
                        error_log("APIFrame: Unknown status: " . $status . ", retrying...");
                        sleep(5);
                        break;
                }
                
            } catch (\Exception $e) {
                error_log("APIFrame: Polling error: " . $e->getMessage());
                if ($attempts >= $maxAttempts) {
                    throw $e;
                }
                sleep(5);
            }
        }
        
        throw new DomainException('Image generation timed out after ' . ($maxAttempts * 5) . ' seconds');
    }

    /**
     * Extract image URL from completed response
     */
    private function extractImageUrl(array $result): string
    {
        // According to APIFrame docs, completed response has:
        // "image_urls": ["url1", "url2", "url3", "url4"]
        // or "original_image_url": "grid_url"
        
        // Try image_urls array first (most common)
        if (isset($result['image_urls']) && is_array($result['image_urls']) && !empty($result['image_urls'])) {
            $imageUrl = $result['image_urls'][0]; // Use first image
            error_log("APIFrame: Found image_urls, using first: " . $imageUrl);
            return $imageUrl;
        }
        
        // Try single image_url
        if (isset($result['image_url'])) {
            error_log("APIFrame: Found single image_url: " . $result['image_url']);
            return $result['image_url'];
        }
        
        // Try original_image_url (grid)
        if (isset($result['original_image_url'])) {
            error_log("APIFrame: Found original_image_url: " . $result['original_image_url']);
            return $result['original_image_url'];
        }
        
        throw new DomainException('No image URLs found in completed response');
    }
    
    /**
     * Process image from URL and complete the entity
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
            
            // Save image using same pattern as other services
            $file = $this->saveImage($imageData, $entity->getWorkspace(), $entity->getUser());
            
            // Complete the entity
            $entity->setOutputFile($file);
            $entity->setState(State::COMPLETED);
            
            error_log("APIFrame: Image processing completed successfully");
            
        } catch (\Exception $e) {
            error_log("APIFrame: Error processing image: " . $e->getMessage());
            $entity->setState(State::FAILED);
            throw new DomainException('Image processing failed: ' . $e->getMessage());
        }
    }

    /**
     * Save image content to CDN and return ImageFileEntity
     */
    private function saveImage(
        string $content,
        WorkspaceEntity $workspace,
        UserEntity $user
    ): ImageFileEntity {
        // Generate CDN path
        $name = $this->cdn->generatePath('png', $workspace, $user);
        
        // Upload to CDN
        $this->cdn->write($name, $content);
        
        // Create image resource for dimensions
        $img = imagecreatefromstring($content);
        if ($img === false) {
            throw new \Exception('Invalid image data');
        }
        
        $width = imagesx($img);
        $height = imagesy($img);
        
        error_log("APIFrame: Image dimensions: {$width}x{$height}");
        error_log("APIFrame: Image uploaded to CDN: " . $this->cdn->getUrl($name));
        
        $file = new ImageFileEntity(
            new Storage($this->cdn->getAdapterLookupKey()),
            new ObjectKey($name),
            new Url($this->cdn->getUrl($name)),
            new Size(strlen($content)),
            new Width($width),
            new Height($height),
            BlurhashGenerator::generateBlurHash($img, $width, $height),
        );
        
        imagedestroy($img);
        return $file;
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
}