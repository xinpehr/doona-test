<?php

declare(strict_types=1);

namespace Aikeedo\Runway;

use Ai\Domain\Entities\VideoEntity;
use Ai\Domain\Exceptions\DomainException;
use Ai\Domain\ValueObjects\Model;
use Ai\Domain\ValueObjects\RequestParams;
use Ai\Domain\Video\VideoServiceInterface;
use Easy\Container\Attributes\Inject;
use League\Flysystem\Visibility;
use Override;
use Psr\Http\Message\UploadedFileInterface;
use Shared\Infrastructure\FileSystem\CdnInterface;
use Shared\Infrastructure\Services\ModelRegistry;
use Traversable;
use User\Domain\Entities\UserEntity;
use Workspace\Domain\Entities\WorkspaceEntity;

class VideoService implements VideoServiceInterface
{
    private ?array $models = null;

    public function __construct(
        private Client $client,
        private Helper $helper,
        private ModelRegistry $registry,
        private CdnInterface $cdn,

        #[Inject('option.features.video.is_enabled')]
        private bool $isToolEnabled = false,

        #[Inject('option.runway.api_key')]
        private ?string $apiKey = null,
    ) {
    }

    #[Override]
    public function generateVideo(
        WorkspaceEntity $workspace,
        UserEntity $user,
        Model $model,
        ?array $params = null
    ): VideoEntity {
        if (!$params || !array_key_exists('prompt', $params)) {
            throw new DomainException('Missing parameter: prompt');
        }

        $card = $this->models[$model->value];

        $entity = new VideoEntity(
            $workspace,
            $user,
            $model,
            RequestParams::fromArray($params)
        );

        $data = [
            'model' => $model->value,
            'promptText' => $params['prompt'],
            'ratio' => $params['ratio'] ?? '1920:1080',
            'duration' => (int)($params['duration'] ?? 5),
        ];

        // Handle reference image for image-to-video generation
        if (isset($params['images']) && isset($card['config']['reference_images'])) {
            $limit = $card['config']['reference_images']['limit'] ?? 1;

            if (count($params['images']) > 0) {
                /** @var UploadedFileInterface $image */
                $image = $params['images'][0]; // Take first image only for video
                $filename = $image->getClientFilename();
                $extension = pathinfo($filename, PATHINFO_EXTENSION);

                $key = $this->cdn->generatePath($extension, $workspace, $user);
                $this->cdn->write($key, $image->getStream()->getContents(), [
                    'visibility' => Visibility::PUBLIC
                ]);

                $url = $this->cdn->getUrl($key);
                $data['imagePrompt'] = $url;
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

            $val = $params[$p['key']];

            // Convert string values to appropriate types
            if ($val === 'true') {
                $val = true;
            } elseif ($val === 'false') {
                $val = false;
            } elseif (is_numeric($val)) {
                $val = is_float($val) ? (float)$val : (int)$val;
            }

            $data[$p['key']] = $val;
        }

        // Determine the appropriate endpoint based on model and inputs
        $endpoint = '/v1/videos/generations';
        if (isset($data['imagePrompt'])) {
            $endpoint = '/v1/videos/generations'; // Same endpoint, different parameters
        }

        // Send request to Runway API
        $resp = $this->client->sendRequest(
            'POST',
            $endpoint,
            $data
        );

        $content = json_decode($resp->getBody()->getContents());

        // Store task ID for tracking
        $entity->addMeta('runway_task_id', $content->id ?? $content->taskId ?? null);
        $entity->addMeta('runway_model', $model->value);
        $entity->addMeta('runway_webhook_url', $this->helper->getCallBackUrl($entity));

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
            $model['type'] === 'video' && ($model['enabled'] ?? false)
        );

        $this->models = array_reduce($models, function ($carry, $model) {
            $carry[$model['key']] = $model;
            return $carry;
        }, []);
    }
}
