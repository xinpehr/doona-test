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
        if (!$params || !array_key_exists('prompt', $params)) {
            throw new DomainException('Missing parameter: prompt');
        }

        if (!$this->supportsModel($model)) {
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

            // Start polling for result
            $this->pollTaskResult($entity, $response['task_id']);

        } catch (\Exception $e) {
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
     * Poll task result using APIFrame fetch endpoint
     */
    private function pollTaskResult(ImageEntity $entity, string $taskId): void
    {
        $maxAttempts = 60; // Max 5 minutes (60 * 5 seconds)
        $attempt = 0;
        
        while ($attempt < $maxAttempts) {
            try {
                sleep(5); // Wait 5 seconds between polls
                $attempt++;
                
                $result = $this->client->fetch($taskId);
                
                if (isset($result['status'])) {
                    switch ($result['status']) {
                        case 'completed':
                            if (isset($result['image_url'])) {
                                $this->handleImageResult($entity, $result['image_url']);
                                return;
                            }
                            break;
                            
                        case 'failed':
                        case 'error':
                            $error = $result['error'] ?? 'Image generation failed';
                            $entity->addMeta('apiframe_error', $error);
                            return;
                            
                        case 'pending':
                        case 'processing':
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
            // Download and store the image
            $imageData = file_get_contents($imageUrl);
            if ($imageData === false) {
                throw new DomainException('Failed to download image from APIFrame');
            }
            
            // Generate filename
            $extension = pathinfo(parse_url($imageUrl, PHP_URL_PATH), PATHINFO_EXTENSION) ?: 'png';
            $filename = 'apiframe_' . $entity->getId()->getValue() . '.' . $extension;
            
            // Store in CDN
            $url = $this->cdn->upload($imageData, $filename);
            
            // Update entity
            $entity->setOutputImageUrl($url);
            $entity->addMeta('apiframe_completed', true);
            $entity->addMeta('apiframe_original_url', $imageUrl);
            
        } catch (\Exception $e) {
            $entity->addMeta('apiframe_error', 'Failed to process image: ' . $e->getMessage());
        }
    }
}
