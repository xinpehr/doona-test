<?php

declare(strict_types=1);

namespace Aikeedo\ApiFrame;

use Ai\Application\Commands\ReadLibraryItemCommand;
use Ai\Domain\Entities\ImageEntity;
use Ai\Domain\Exceptions\LibraryItemNotFoundException;
use Ai\Domain\ValueObjects\State;
use Easy\Http\Message\RequestMethod;
use Easy\Router\Attributes\Route;
use Presentation\Response\JsonResponse;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Shared\Infrastructure\CommandBus\Dispatcher;

/**
 * APIFrame Task Status API
 * 
 * Allows frontend to check the status of APIFrame tasks
 */
#[Route(path: '/api/apiframe/status/[uuid:id]', method: RequestMethod::GET)]
class TaskStatusApi implements RequestHandlerInterface
{
    public function __construct(
        private Dispatcher $dispatcher,
        private Client $client,
    ) {}

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $id = $request->getAttribute('id');

        try {
            // Get the image entity
            $cmd = new ReadLibraryItemCommand($id);
            $entity = $this->dispatcher->dispatch($cmd);

            if (!($entity instanceof ImageEntity)) {
                return new JsonResponse([
                    'error' => 'Not an image entity'
                ], 404);
            }

            // Check if it's an APIFrame task
            $taskId = $entity->getMeta('apiframe_task_id');
            if (!$taskId) {
                return new JsonResponse([
                    'error' => 'Not an APIFrame task'
                ], 404);
            }

            // If already completed, return current status
            if ($entity->getState() === State::COMPLETED) {
                return new JsonResponse([
                    'status' => 'completed',
                    'state' => $entity->getState()->value,
                    'has_output' => $entity->getOutputFile() !== null
                ]);
            }

            if ($entity->getState() === State::FAILED) {
                return new JsonResponse([
                    'status' => 'failed',
                    'state' => $entity->getState()->value,
                    'error' => $entity->getMeta('apiframe_error') ?? 'Unknown error'
                ]);
            }

            // Check APIFrame status
            try {
                $result = $this->client->fetch($taskId);
                
                if (isset($result['status'])) {
                    switch ($result['status']) {
                        case 'completed':
                        case 'finished':
                            // Update entity here if needed
                            return new JsonResponse([
                                'status' => 'completed',
                                'apiframe_status' => $result['status'],
                                'state' => $entity->getState()->value,
                                'needs_processing' => true
                            ]);
                            
                        case 'failed':
                        case 'error':
                            return new JsonResponse([
                                'status' => 'failed',
                                'apiframe_status' => $result['status'],
                                'error' => $result['error'] ?? 'Task failed'
                            ]);
                            
                        default:
                            return new JsonResponse([
                                'status' => 'processing',
                                'apiframe_status' => $result['status'],
                                'progress' => $result['percentage'] ?? null
                            ]);
                    }
                }
                
                return new JsonResponse([
                    'status' => 'processing',
                    'state' => $entity->getState()->value
                ]);
                
            } catch (\Exception $e) {
                return new JsonResponse([
                    'status' => 'error',
                    'error' => 'Failed to check APIFrame status: ' . $e->getMessage()
                ], 500);
            }

        } catch (LibraryItemNotFoundException $e) {
            return new JsonResponse([
                'error' => 'Entity not found'
            ], 404);
        }
    }
}
