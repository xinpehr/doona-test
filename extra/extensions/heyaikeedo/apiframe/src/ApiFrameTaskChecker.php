<?php

declare(strict_types=1);

namespace Aikeedo\ApiFrame;

use Ai\Domain\Entities\ImageEntity;
use Ai\Domain\Repositories\LibraryItemRepositoryInterface;
use Ai\Domain\ValueObjects\State;
use Cron\Domain\Events\CronEvent;
use Easy\Container\Attributes\Inject;
use Shared\Infrastructure\CommandBus\Dispatcher;

/**
 * APIFrame Task Checker for Cron Jobs
 * 
 * Periodically checks pending APIFrame tasks and updates them when completed.
 */
class ApiFrameTaskChecker
{
    public function __construct(
        private Dispatcher $dispatcher,
        private LibraryItemRepositoryInterface $repo,
        private ImageGeneratorService $service,
        private Client $client,

        #[Inject('option.cron.apiframe.cursor_id')]
        private ?string $cursorId = null,
    ) {}

    /**
     * Check pending APIFrame tasks
     */
    public function __invoke(CronEvent $event): void
    {
        error_log("APIFrame Cron: Starting task check...");
        
        try {
            // Find pending APIFrame tasks
            $pendingTasks = $this->findPendingTasks();
            
            foreach ($pendingTasks as $entity) {
                $this->checkAndUpdateTask($entity);
            }
            
            error_log("APIFrame Cron: Task check completed");
            
        } catch (\Exception $e) {
            error_log("APIFrame Cron: Error during task check: " . $e->getMessage());
        }
    }

    /**
     * Find pending APIFrame image entities
     */
    private function findPendingTasks(): array
    {
        // For now, return empty array
        // In production, this would query the database for:
        // - ImageEntity with state PROCESSING
        // - Has apiframe_task_id metadata
        // - Created within last 24 hours
        
        error_log("APIFrame Cron: Looking for pending tasks...");
        
        // TODO: Implement database query
        // $qb = $this->repo->createQueryBuilder()
        //     ->select('i')
        //     ->from(ImageEntity::class, 'i')
        //     ->where('i.state = :processing')
        //     ->andWhere('i.meta LIKE :apiframe')
        //     ->setParameter('processing', State::PROCESSING->value)
        //     ->setParameter('apiframe', '%apiframe_task_id%');
        
        return [];
    }

    /**
     * Check and update a specific task
     */
    private function checkAndUpdateTask(ImageEntity $entity): void
    {
        $taskId = $entity->getMeta('apiframe_task_id');
        if (!$taskId) {
            return;
        }
        
        error_log("APIFrame Cron: Checking task: " . $taskId);
        
        try {
            $result = $this->client->fetch($taskId);
            
            if (isset($result['status'])) {
                switch ($result['status']) {
                    case 'completed':
                    case 'finished':
                        $this->handleCompletedTask($entity, $result);
                        break;
                        
                    case 'failed':
                    case 'error':
                        $this->handleFailedTask($entity, $result);
                        break;
                        
                    default:
                        error_log("APIFrame Cron: Task still processing: " . $result['status']);
                        break;
                }
            }
            
        } catch (\Exception $e) {
            error_log("APIFrame Cron: Error checking task " . $taskId . ": " . $e->getMessage());
        }
    }

    /**
     * Handle completed task
     */
    private function handleCompletedTask(ImageEntity $entity, array $result): void
    {
        error_log("APIFrame Cron: Task completed, updating entity");
        
        // Use the same logic as in ImageGeneratorService
        if (isset($result['image_url'])) {
            $imageUrl = $result['image_url'];
        } elseif (isset($result['image_urls']) && is_array($result['image_urls']) && !empty($result['image_urls'])) {
            $imageUrl = $result['image_urls'][0];
        } else {
            error_log("APIFrame Cron: No image URLs found in completed task");
            return;
        }
        
        // Process the image (download, save to CDN, create ImageFileEntity)
        // This would use the same handleImageResult logic from ImageGeneratorService
        error_log("APIFrame Cron: Would process image URL: " . $imageUrl);
        
        // For now, just mark as completed
        $entity->setState(State::COMPLETED);
        $this->repo->flush();
    }

    /**
     * Handle failed task
     */
    private function handleFailedTask(ImageEntity $entity, array $result): void
    {
        error_log("APIFrame Cron: Task failed");
        
        $error = $result['error'] ?? 'Task failed';
        $entity->addMeta('apiframe_error', $error);
        $entity->setState(State::FAILED);
        
        $this->repo->flush();
    }
}
