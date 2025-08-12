<?php

declare(strict_types=1);

namespace Aikeedo\Runway;

use Ai\Domain\Entities\ImageEntity;
use Ai\Domain\Exceptions\DomainException;
use Ai\Domain\Image\ImageServiceInterface;
use Ai\Domain\ValueObjects\Model;
use Ai\Domain\ValueObjects\RequestParams;
use Ai\Infrastructure\Services\CostCalculator;
use Easy\Container\Attributes\Inject;
use League\Flysystem\Visibility;
use Override;
use Psr\Http\Message\UploadedFileInterface;
use Shared\Infrastructure\FileSystem\CdnInterface;
use Shared\Infrastructure\Services\ModelRegistry;
use Traversable;
use User\Domain\Entities\UserEntity;
use Workspace\Domain\Entities\WorkspaceEntity;

class ImageGeneratorService implements ImageServiceInterface
{
    private ?array $models = null;

    public function __construct(
        private Client $client,
        private Helper $helper,
        private CostCalculator $calc,
        private CdnInterface $cdn,
        private ModelRegistry $registry,

        #[Inject('option.features.is_safety_enabled')]
        private bool $checkSafety = true,

        #[Inject('option.features.imagine.is_enabled')]
        private bool $isToolEnabled = false,

        #[Inject('option.runway.api_key')]
        private ?string $apiKey = null,
    ) {
    }

    #[Override]
    public function generateImage(
        WorkspaceEntity $workspace,
        UserEntity $user,
        Model $model,
        ?array $params = null
    ): ImageEntity {
        error_log("Runway ImageGeneratorService: generateImage called with model: " . $model->value);
        
        if (!$params || !array_key_exists('prompt', $params)) {
            error_log("Runway ImageGeneratorService: Missing prompt parameter");
            throw new DomainException('Missing parameter: prompt');
        }
        
        error_log("Runway ImageGeneratorService: API Key present: " . ($this->apiKey ? 'Yes' : 'No'));

        $this->parseDirectory();
        
        if (!isset($this->models[$model->value])) {
            error_log("Runway ImageGeneratorService: Model {$model->value} not found in models array");
            error_log("Runway ImageGeneratorService: Available models: " . json_encode(array_keys($this->models ?? [])));
            throw new DomainException("Model {$model->value} is not supported");
        }
        
        $card = $this->models[$model->value];
        error_log("Runway ImageGeneratorService: Using model config: " . json_encode($card));

        $entity = new ImageEntity(
            $workspace,
            $user,
            $model,
            RequestParams::fromArray($params),
        );

        $data = [
            'model' => $model->value,
            'promptText' => $params['prompt'],
            'ratio' => $params['ratio'] ?? '1920:1080',
        ];

        // Handle reference images for style transfer
        if (isset($params['images']) && isset($card['config']['reference_images'])) {
            $referenceImages = [];
            $limit = $card['config']['reference_images']['limit'] ?? 5;
            $i = 0;

            /** @var UploadedFileInterface $image */
            foreach ($params['images'] as $image) {
                if ($i >= $limit) {
                    break;
                }

                $filename = $image->getClientFilename();
                $extension = pathinfo($filename, PATHINFO_EXTENSION);

                $key = $this->cdn->generatePath($extension, $workspace, $user);
                $this->cdn->write($key, $image->getStream()->getContents(), [
                    'visibility' => Visibility::PUBLIC
                ]);

                $url = $this->cdn->getUrl($key);
                
                // For reference images, we need a tag system like in the Runway API
                $tag = 'ref' . ($i + 1);
                $referenceImages[] = [
                    'uri' => $url,
                    'tag' => $tag
                ];

                // Update prompt to include reference tags
                $data['promptText'] = str_replace(
                    ['@ref' . ($i + 1), '@reference' . ($i + 1)],
                    '@' . $tag,
                    $data['promptText']
                );

                $i++;
            }

            if (!empty($referenceImages)) {
                $data['referenceImages'] = $referenceImages;
            }
        }

        // Handle additional parameters from config
        foreach ($card['config']['params'] ?? [] as $p) {
            if (!isset($params[$p['key']])) {
                continue;
            }

            $allowed = array_map(fn($o) => $o['value'], $p['options'] ?? []);
            if (!in_array($params[$p['key']], $allowed)) {
                continue;
            }

            $data[$p['key']] = $params[$p['key']];
        }

        try {
            error_log("Runway ImageGeneratorService: Sending API request with data: " . json_encode($data));
            
            // Send request to Runway API
            $resp = $this->client->sendRequest(
                'POST',
                '/v1/images/generations',
                $data
            );

            error_log("Runway ImageGeneratorService: API response status: " . $resp->getStatusCode());
            $content = json_decode($resp->getBody()->getContents());
            error_log("Runway ImageGeneratorService: API response: " . json_encode($content));

            // Store task ID for tracking
            $entity->addMeta('runway_task_id', $content->id ?? $content->taskId ?? null);
            $entity->addMeta('runway_model', $model->value);

            error_log("Runway ImageGeneratorService: Successfully created entity");
            return $entity;
            
        } catch (\Exception $e) {
            error_log("Runway ImageGeneratorService: Exception occurred: " . $e->getMessage());
            error_log("Runway ImageGeneratorService: Exception trace: " . $e->getTraceAsString());
            throw $e;
        }
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

    private function parseDirectory(): void
    {
        if ($this->models !== null) {
            return;
        }

        if (!$this->isToolEnabled) {
            $this->models = [];
            return;
        }

        $services = array_filter($this->registry['directory'], fn($service) => $service['key'] === 'runway');

        if (count($services) === 0) {
            $this->models = [];
            return;
        }

        $service = array_values($services)[0];
        $models = array_filter($service['models'], fn($model) => 
            $model['type'] === 'image' && ($model['enabled'] ?? false)
        );

        $this->models = array_reduce($models, function ($carry, $model) {
            $carry[$model['key']] = $model;
            return $carry;
        }, []);
    }
}
