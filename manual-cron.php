<?php

declare(strict_types=1);

echo "Manual APIFrame Cron Processing\n";
echo "===============================\n\n";

// Include the bootstrap
/** @var \Psr\Container\ContainerInterface $container */
$container = include __DIR__ . '/bootstrap/app.php';

try {
    // Get the entity manager to check for pending tasks
    $em = $container->get(\Doctrine\ORM\EntityManagerInterface::class);
    
    // Find pending APIFrame tasks
    $qb = $em->createQueryBuilder();
    $qb->select('e')
       ->from(\Ai\Domain\Entities\ImageEntity::class, 'e')
       ->where('e.state = :processing')
       ->andWhere('e.metadata LIKE :apiframe_pattern')
       ->setParameter('processing', \Ai\Domain\ValueObjects\State::PROCESSING)
       ->setParameter('apiframe_pattern', '%apiframe_task_id%')
       ->setMaxResults(10);

    /** @var \Ai\Domain\Entities\ImageEntity[] $entities */
    $entities = $qb->getQuery()->getResult();
    
    echo "Found " . count($entities) . " pending APIFrame tasks\n\n";
    
    if (empty($entities)) {
        echo "No pending tasks to process.\n";
        exit(0);
    }
    
    // Get the APIFrame service
    $service = $container->get(\Aikeedo\ApiFrame\ImageGeneratorService::class);
    
    foreach ($entities as $entity) {
        $taskId = $entity->getMeta('apiframe_task_id');
        echo "Processing entity {$entity->getId()->getValue()}, task_id: {$taskId}\n";
        
        try {
            $service->checkTaskStatus($entity);
            $em->persist($entity);
            echo "  Status checked and updated\n";
        } catch (\Exception $e) {
            echo "  Error: " . $e->getMessage() . "\n";
        }
    }
    
    // Flush all changes
    $em->flush();
    echo "\nAll tasks processed and database updated!\n";
    
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
    echo "Stack trace:\n" . $e->getTraceAsString() . "\n";
}