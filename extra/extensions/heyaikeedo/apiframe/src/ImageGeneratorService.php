<?php

declare(strict_types=1);

namespace Aikeedo\ApiFrame;

use Ai\Domain\Entities\ImageEntity;
use Ai\Domain\Exceptions\DomainException;
use Ai\Domain\Image\ImageServiceInterface;
use Ai\Domain\ValueObjects\Model;
use Ai\Domain\ValueObjects\RequestParams;
use Ai\Domain\ValueObjects\State;
use Ai\Domain\ValueObjects\Title;
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
            RequestParams::fromArray($params)
        );
        
        // Set a basic title from prompt to avoid title generation issues
        if (isset($params['prompt'])) {
            $title = mb_substr($params['prompt'], 0, 100); // Limit to 100 characters
            $entity->setTitle(new Title($title));
            error_log("APIFrame: Set title: " . $title);
        }
        
        // Note: Don't set output file yet - will be set when image is ready (like FalAI)
        // Set initial state as PROCESSING so it appears in archive
        $entity->setState(State::PROCESSING);
        error_log("APIFrame: Entity created without output file (will be set asynchronously)");

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
            $entity->addMeta('apiframe_status', 'pending');

            error_log("APIFrame: Task submitted successfully. Starting immediate check...");
            
            // Try immediate check first (sometimes tasks complete quickly)
            $this->checkTaskOnce($entity, $response['task_id']);
            
            // If not completed, start background polling
            if ($entity->getState() === State::PROCESSING) {
                error_log("APIFrame: Starting background polling for task: " . $response['task_id']);
                // Fork a background process to poll the task
                $this->startBackgroundPolling($entity, $response['task_id']);
            }

        } catch (\Exception $e) {
            error_log("APIFrame: Exception occurred: " . $e->getMessage());
            error_log("APIFrame: Exception class: " . get_class($e));
            error_log("APIFrame: Exception trace: " . $e->getTraceAsString());
            throw new DomainException('Failed to generate image: ' . $e->getMessage());
        }

        error_log("APIFrame: Returning entity with ID: " . $entity->getId()->getValue());
        error_log("APIFrame: Entity state: " . $entity->getState()->value);
        error_log("APIFrame: Entity cost: " . $entity->getCost()->value);
        error_log("APIFrame: Entity output file: " . ($entity->getOutputFile() ? 'SET' : 'NULL'));
        
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
     * Public method to check and update APIFrame tasks
     * Can be called by cron jobs or API endpoints
     */
    public function checkPendingTasks(): void
    {
        error_log("APIFrame: Checking all pending tasks...");
        
        // This method can be called by:
        // 1. Cron job every few minutes
        // 2. API endpoint for manual refresh
        // 3. Background worker process
        
        // For now, just log that it's available
        // Implementation would query database for pending APIFrame tasks
        // and check their status using the fetch API
    }
    
    /**
     * Public method to check a specific task by entity ID
     */
    public function checkTaskById(string $entityId): bool
    {
        error_log("APIFrame: Checking task for entity: " . $entityId);
        
        // Load entity from database
        // Get task_id from metadata
        // Call fetch API
        // Update entity if completed
        
        return false; // Return true if updated
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
     * Start background polling for the task
     */
    private function startBackgroundPolling(ImageEntity $entity, string $taskId): void
    {
        error_log("APIFrame: Background polling will be handled by frontend or cron job");
        
        // For now, let's try one immediate check after a short delay
        // Frontend will handle the main polling
        
        // Optional: Start a simple background check
        $this->scheduleTaskCheck($entity, $taskId);
    }
    
    /**
     * Schedule a task check (can be improved with proper queue system)
     */
    private function scheduleTaskCheck(ImageEntity $entity, string $taskId): void
    {
        // For now, let's do a delayed check
        // In production, this should be handled by a proper queue system
        error_log("APIFrame: Scheduling delayed task check for: " . $taskId);
        
        // You can implement this better with:
        // 1. Redis queue
        // 2. Database queue table  
        // 3. Cron job that checks pending tasks
        // 4. Background worker process
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
        
        $maxAttempts = 24; // Max 2 minutes (24 * 5 seconds)
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
                            $entity->setState(State::FAILED);
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
        error_log("APIFrame: Polling timeout for task: " . $taskId);
        $entity->addMeta('apiframe_error', 'Task timeout after 2 minutes');
        $entity->setState(State::FAILED);
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
            
            // Generate proper CDN path
            $extension = pathinfo(parse_url($imageUrl, PHP_URL_PATH), PATHINFO_EXTENSION) ?: 'png';
            $name = $this->cdn->generatePath($extension, $entity->getWorkspace(), $entity->getUser());
            
            error_log("APIFrame: Generated CDN path: " . $name);
            
            // Store in CDN
            try {
                $this->cdn->write($name, $imageData);
                $cdnUrl = $this->cdn->getUrl($name);
                error_log("APIFrame: Image uploaded to CDN, URL: " . $cdnUrl);
            } catch (\Exception $e) {
                error_log("APIFrame: CDN upload failed: " . $e->getMessage());
                throw new DomainException('Failed to upload image to CDN: ' . $e->getMessage());
            }
            
            // Create image resource for getting dimensions and blur hash
            try {
                $img = imagecreatefromstring($imageData);
                if ($img === false) {
                    throw new DomainException('Invalid image data');
                }
                
                $width = imagesx($img);
                $height = imagesy($img);
                
                error_log("APIFrame: Image dimensions: {$width}x{$height}");
                
                // Create ImageFileEntity
                $file = new ImageFileEntity(
                    new Storage($this->cdn->getAdapterLookupKey()),
                    new ObjectKey($name),
                    new Url($cdnUrl),
                    new Size(strlen($imageData)),
                    new Width($width),
                    new Height($height),
                    BlurHashGenerator::generateBlurHash($img, $width, $height)
                );
                
                error_log("APIFrame: ImageFileEntity created successfully");
                
                // Calculate and add cost
                $cost = $this->calc->calculate(1, $entity->getModel());
                $entity->addCost($cost);
                
                // Set the file and complete the entity
                $entity->setOutputFile($file);
                $entity->setState(State::COMPLETED);
                
                error_log("APIFrame: Entity state set to COMPLETED with cost: " . $cost->value);
                
                imagedestroy($img);
                
            } catch (\Exception $e) {
                error_log("APIFrame: Image processing failed: " . $e->getMessage());
                throw new DomainException('Failed to process image: ' . $e->getMessage());
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
