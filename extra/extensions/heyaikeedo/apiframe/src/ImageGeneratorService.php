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
        error_log("APIFrame: generateImage called with model: " . $model->value);
        error_log("APIFrame: Available models: " . json_encode(array_keys($this->models ?? [])));
        
        if (!$params || !array_key_exists('prompt', $params)) {
            error_log("APIFrame Error: Missing prompt parameter");
            throw new DomainException('Missing parameter: prompt');
        }

        if (!$this->supportsModel($model)) {
            error_log("APIFrame Error: Model not supported: " . $model->value);
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

        // Generate webhook URL and secret
        $webhookUrl = $this->helper->getCallBackUrl($entity);
        $webhookSecret = $this->helper->generateWebhookSecret($entity);

        try {
            error_log("APIFrame: API Key available: " . ($this->apiKey ? 'YES' : 'NO'));
            error_log("APIFrame: Tool enabled: " . ($this->isToolEnabled ? 'YES' : 'NO'));
            error_log("APIFrame: Prompt: " . $params['prompt']);
            error_log("APIFrame: Mode: " . $mode);
            error_log("APIFrame: Webhook URL: " . $webhookUrl);
            
            // Send imagine request to APIFrame
            $response = $this->client->imagine(
                $params['prompt'],
                $mode,
                $webhookUrl,
                $webhookSecret
            );
            
            error_log("APIFrame: Response received: " . json_encode($response));

            if (!isset($response['task_id'])) {
                throw new DomainException('Invalid response from APIFrame API');
            }

            // Store task information in entity metadata
            $entity->addMeta('apiframe_task_id', $response['task_id']);
            $entity->addMeta('apiframe_webhook_secret', $webhookSecret);
            $entity->addMeta('apiframe_mode', $mode);

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
}
