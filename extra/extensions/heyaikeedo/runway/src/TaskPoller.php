<?php

declare(strict_types=1);

namespace Aikeedo\Runway;

use Ai\Domain\Entities\ImageEntity;
use Ai\Domain\Entities\VideoEntity;
use Ai\Domain\ValueObjects\State;
use Ai\Domain\Repositories\LibraryItemRepositoryInterface;
use Easy\Container\Attributes\Inject;
use Shared\Infrastructure\CommandBus\Dispatcher;

/**
 * Task poller for checking Runway task status
 * Since Runway API might not support webhooks properly,
 * we poll task status periodically
 */
class TaskPoller
{
    public function __construct(
        private Client $client,
        private LibraryItemRepositoryInterface $repo,
        private ImageWebhookProcessor $imageProcessor,
        private VideoWebhookProcessor $videoProcessor,

        #[Inject('option.runway.api_key')]
        private ?string $apiKey = null,
    ) {}

    /**
     * Poll status of pending Runway tasks
     */
    public function pollPendingTasks(): void
    {
        if (!$this->apiKey) {
            error_log("Runway TaskPoller: No API key configured");
            return;
        }

        // Find all pending Runway tasks
        $entities = $this->repo->findBy([
            'state' => [State::QUEUED, State::PROCESSING],
            'model' => ['gen4_image', 'gen4_turbo', 'gen4_aleph']
        ]);

        foreach ($entities as $entity) {
            if (!$entity->hasMeta('runway_task_id')) {
                continue;
            }

            $taskId = $entity->getMeta('runway_task_id');
            
            try {
                $this->checkTaskStatus($entity, $taskId);
            } catch (\Exception $e) {
                error_log("Runway TaskPoller: Error checking task {$taskId}: " . $e->getMessage());
            }
        }
    }

    /**
     * Check status of a specific task
     */
    private function checkTaskStatus(ImageEntity|VideoEntity $entity, string $taskId): void
    {
        error_log("Runway TaskPoller: Checking status for task {$taskId}");

        // Get task status from Runway API
        $response = $this->client->sendRequest('GET', "/v1/tasks/{$taskId}");
        $data = json_decode($response->getBody()->getContents());

        if (!$data) {
            error_log("Runway TaskPoller: Invalid response for task {$taskId}");
            return;
        }

        error_log("Runway TaskPoller: Task {$taskId} status: " . json_encode($data));

        // Process the response using appropriate webhook processor
        if ($entity instanceof ImageEntity) {
            $this->imageProcessor->__invoke($entity, $data);
        } elseif ($entity instanceof VideoEntity) {
            $this->videoProcessor->__invoke($entity, $data);
        }

        // Save changes
        $this->repo->add($entity);
    }
}
