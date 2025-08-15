<?php

declare(strict_types=1);

echo "Testing APIFrame background processing...\n";

// Include the bootstrap
/** @var \Psr\Container\ContainerInterface $container */
$container = include __DIR__ . '/bootstrap/app.php';

try {
    // Get the APIFrame cron listener
    $cronListener = $container->get(\Aikeedo\ApiFrame\ApiFrameCronListener::class);
    
    // Create a fake cron event
    $cronEvent = new \Cron\Domain\Events\CronEvent();
    
    // Manually invoke the listener
    echo "Invoking APIFrame cron listener...\n";
    $cronListener($cronEvent);
    
    echo "APIFrame cron processing completed!\n";
    
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
    echo "Stack trace:\n" . $e->getTraceAsString() . "\n";
}