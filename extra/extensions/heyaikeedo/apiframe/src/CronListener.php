<?php

declare(strict_types=1);

namespace Aikeedo\ApiFrame;

use Ai\Domain\Entities\ImageEntity;
use Ai\Domain\ValueObjects\State;
use Cron\Domain\Events\CronEvent;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\QueryBuilder;
use Easy\Container\Attributes\Inject;
use Override;
use Psr\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * APIFrame Background Processing Listener
 * 
 * Processes pending APIFrame tasks via cron job.
 * Polls the APIFrame API for task completion and updates entities accordingly.
 */
class CronListener implements EventSubscriberInterface
{
    public function __construct(
        private EntityManagerInterface $em,
        private ImageGeneratorService $service,

        #[Inject('option.features.imagine.is_enabled')]
        private bool $isEnabled = false,

        #[Inject('option.apiframe.api_key')]
        private ?string $apiKey = null,
    ) {}

    #[Override]
    public static function getSubscribedEvents(): array
    {
        return [
            CronEvent::class => 'handleCron'
        ];
    }

    public function handleCron(CronEvent $event): void
    {
        if (!$this->isEnabled || !$this->apiKey) {
            return;
        }

        error_log("APIFrame: Starting background processing cron job");
        
        try {
            $this->processAPIFrameTasks();
        } catch (\Exception $e) {
            error_log("APIFrame: Cron job error: " . $e->getMessage());
        }
    }

    /**
     * Process all pending APIFrame tasks
     */
    private function processAPIFrameTasks(): void
    {
        // Find all processing APIFrame entities
        $qb = $this->em->createQueryBuilder();
        $qb->select('e')
           ->from(ImageEntity::class, 'e')
           ->where('e.state = :processing')
           ->andWhere('e.metadata LIKE :apiframe_pattern')
           ->setParameter('processing', State::PROCESSING)
           ->setParameter('apiframe_pattern', '%apiframe_task_id%')
           ->setMaxResults(50); // Limit to avoid overload

        /** @var ImageEntity[] $entities */
        $entities = $qb->getQuery()->getResult();
        
        $processed = 0;
        foreach ($entities as $entity) {
            try {
                $taskId = $entity->getMeta('apiframe_task_id');
                if (!$taskId) {
                    continue;
                }

                error_log("APIFrame: Processing background task for entity: " . $entity->getId()->getValue() . ", task_id: " . $taskId);
                
                // Check if entity is too old (over 10 minutes) and mark as failed
                $createdAt = $entity->getMeta('apiframe_created_at');
                if ($createdAt && (time() - $createdAt) > 600) {
                    error_log("APIFrame: Task timeout for entity: " . $entity->getId()->getValue());
                    $entity->setState(State::FAILED);
                    $entity->addMeta('apiframe_error', 'Task timed out after 10 minutes');
                    $this->em->persist($entity);
                    $processed++;
                    continue;
                }

                // Use existing checkTaskStatus method
                $this->service->checkTaskStatus($entity);
                $this->em->persist($entity);
                $processed++;

                // Avoid overwhelming the API
                if ($processed >= 10) {
                    break;
                }

                // Small delay between requests
                usleep(100000); // 0.1 seconds

            } catch (\Exception $e) {
                error_log("APIFrame: Error processing entity " . $entity->getId()->getValue() . ": " . $e->getMessage());
                $entity->setState(State::FAILED);
                $entity->addMeta('apiframe_error', 'Background processing failed: ' . $e->getMessage());
                $this->em->persist($entity);
            }
        }

        if ($processed > 0) {
            $this->em->flush();
            error_log("APIFrame: Processed {$processed} entities in background");
        }
    }
}