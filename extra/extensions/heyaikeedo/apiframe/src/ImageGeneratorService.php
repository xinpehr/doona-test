<?php

declare(strict_types=1);

namespace Aikeedo\ApiFrame;

use Ai\Domain\Entities\ImageEntity;
use Ai\Domain\Exceptions\DomainException;
use Ai\Domain\Image\ImageServiceInterface;
use Ai\Domain\ValueObjects\Model;
use Ai\Domain\ValueObjects\RequestParams;
use Ai\Infrastructure\Services\CostCalculator;
use Easy\Container\Attributes\Inject;
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
        error_log("APIFrame: generateImage called - Start");
        error_log("APIFrame: Model: " . $model->value);
        error_log("APIFrame: Params: " . json_encode($params));
        
        if (!$params || !array_key_exists('prompt', $params)) {
            error_log("APIFrame: Missing prompt parameter");
            throw new DomainException('Missing parameter: prompt');
        }

        if (!$this->supportsModel($model)) {
            error_log("APIFrame: Model not supported: " . $model->value);
            throw new DomainException('Model not supported: ' . $model->value);
        }

        $card = $this->models[$model->value];
        
        $entity = new ImageEntity(
            $workspace,
            $user,
            $model,
            RequestParams::fromArray($params),
        );

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
            error_log("APIFrame: About to call imagine API");
            error_log("APIFrame: Prompt: " . $params['prompt']);
            error_log("APIFrame: Mode: " . $mode);
            
            // Send imagine request to APIFrame
            $response = $this->client->imagine(
                $params['prompt'],
                $mode
            );

            error_log("APIFrame: API Response: " . json_encode($response));

            if (!isset($response['task_id'])) {
                error_log("APIFrame: Invalid response - no task_id");
                throw new DomainException('Invalid response from APIFrame API');
            }

            error_log("APIFrame: Task ID received: " . $response['task_id']);

            // Store task information in entity metadata
            $entity->addMeta('apiframe_task_id', $response['task_id']);
            $entity->addMeta('apiframe_mode', $mode);

            error_log("APIFrame: Starting immediate check for task: " . $response['task_id']);
            // Check once immediately, don't block the request
            $this->checkTaskOnce($entity, $response['task_id']);

        } catch (\Exception $e) {
            error_log("APIFrame: Exception occurred: " . $e->getMessage());
            error_log("APIFrame: Exception class: " . get_class($e));
            error_log("APIFrame: Exception trace: " . $e->getTraceAsString());
            throw new DomainException('Failed to generate image: ' . $e->getMessage());
        }

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
     * Check task once immediately (non-blocking)
     */
    private function checkTaskOnce(ImageEntity $entity, string $taskId): void
    {
        try {
            error_log("APIFrame: Checking task once: " . $taskId);
            
            $result = $this->client->fetch($taskId);
            error_log("APIFrame: Immediate check result: " . json_encode($result));
            
            if (isset($result['status'])) {
                switch ($result['status']) {
                    case 'completed':
                    case 'finished':
                        // Handle completed task
                        if (isset($result['image_url'])) {
                            error_log("APIFrame: Single image URL found immediately");
                            $this->handleImageResult($entity, $result['image_url']);
                        } elseif (isset($result['image_urls']) && is_array($result['image_urls']) && !empty($result['image_urls'])) {
                            $imageUrl = $result['image_urls'][0];
                            error_log("APIFrame: Multiple images found immediately, using first: " . $imageUrl);
                            $this->handleImageResult($entity, $imageUrl);
                        }
                        break;
                        
                    default:
                        // Task not ready yet, just log and return
                        error_log("APIFrame: Task not ready yet, status: " . $result['status']);
                        $entity->addMeta('apiframe_status', $result['status']);
                        break;
                }
            }
            
        } catch (\Exception $e) {
            error_log("APIFrame: Error in immediate check: " . $e->getMessage());
            // Don't throw, just log
        }
    }

    /**
     * Poll task result using APIFrame fetch endpoint (for background processing)
     */
    private function pollTaskResult(ImageEntity $entity, string $taskId): void
    {
        error_log("APIFrame: pollTaskResult started for task: " . $taskId);
        
        $maxAttempts = 60; // Max 5 minutes (60 * 5 seconds)
        $attempt = 0;
        
        while ($attempt < $maxAttempts) {
            try {
                sleep(5); // Wait 5 seconds between polls
                $attempt++;
                
                error_log("APIFrame: Polling attempt $attempt for task: " . $taskId);
                
                $result = $this->client->fetch($taskId);
                error_log("APIFrame: Fetch result: " . json_encode($result));
                
                if (isset($result['status'])) {
                    switch ($result['status']) {
                        case 'completed':
                        case 'finished':
                            // Handle both 'completed' and 'finished' status
                            if (isset($result['image_url'])) {
                                error_log("APIFrame: Single image URL found");
                                $this->handleImageResult($entity, $result['image_url']);
                                return;
                            } elseif (isset($result['image_urls']) && is_array($result['image_urls']) && !empty($result['image_urls'])) {
                                // Use first image from array
                                $imageUrl = $result['image_urls'][0];
                                error_log("APIFrame: Multiple images found, using first: " . $imageUrl);
                                $this->handleImageResult($entity, $imageUrl);
                                return;
                            } else {
                                error_log("APIFrame: Task finished but no image URLs found");
                                $entity->addMeta('apiframe_error', 'Task completed but no images returned');
                                return;
                            }
                            break;
                            
                        case 'failed':
                        case 'error':
                            $error = $result['error'] ?? 'Image generation failed';
                            error_log("APIFrame: Task failed: " . $error);
                            $entity->addMeta('apiframe_error', $error);
                            return;
                            
                        case 'pending':
                        case 'processing':
                        case 'starting':
                            // Continue polling
                            continue 2;
                    }
                }
                
            } catch (\Exception $e) {
                // Continue polling on error
                continue;
            }
        }
        
        // Timeout reached
        $entity->addMeta('apiframe_error', 'Task timeout after 5 minutes');
    }
    
    /**
     * Handle successful image result
     */
    private function handleImageResult(ImageEntity $entity, string $imageUrl): void
    {
        try {
            error_log("APIFrame: handleImageResult called with URL: " . $imageUrl);
            
            // Download and store the image
            $imageData = file_get_contents($imageUrl);
            if ($imageData === false) {
                error_log("APIFrame: Failed to download image from URL: " . $imageUrl);
                throw new DomainException('Failed to download image from APIFrame');
            }
            
            error_log("APIFrame: Image downloaded successfully, size: " . strlen($imageData) . " bytes");
            
            // Generate filename
            $extension = pathinfo(parse_url($imageUrl, PHP_URL_PATH), PATHINFO_EXTENSION) ?: 'png';
            $filename = 'apiframe_' . $entity->getId()->getValue() . '.' . $extension;
            
            error_log("APIFrame: Generated filename: " . $filename);
            
            // Store in CDN
            try {
                $url = $this->cdn->upload($imageData, $filename);
                error_log("APIFrame: Image uploaded to CDN, URL: " . $url);
            } catch (\Exception $e) {
                error_log("APIFrame: CDN upload failed: " . $e->getMessage());
                throw new DomainException('Failed to upload image to CDN: ' . $e->getMessage());
            }
            
            // Update entity
            try {
                $entity->setOutputImageUrl($url);
                error_log("APIFrame: setOutputImageUrl called successfully");
            } catch (\Exception $e) {
                error_log("APIFrame: setOutputImageUrl failed: " . $e->getMessage());
                throw new DomainException('Failed to set output image URL: ' . $e->getMessage());
            }
            
            try {
                $entity->addMeta('apiframe_completed', true);
                $entity->addMeta('apiframe_original_url', $imageUrl);
                error_log("APIFrame: Meta data added successfully");
            } catch (\Exception $e) {
                error_log("APIFrame: Adding meta failed: " . $e->getMessage());
                throw new DomainException('Failed to add metadata: ' . $e->getMessage());
            }
            
            error_log("APIFrame: Image processing completed successfully");
            
        } catch (\Exception $e) {
            error_log("APIFrame: Error in handleImageResult: " . $e->getMessage());
            error_log("APIFrame: Exception trace: " . $e->getTraceAsString());
            $entity->addMeta('apiframe_error', 'Failed to process image: ' . $e->getMessage());
        }
    }
}
