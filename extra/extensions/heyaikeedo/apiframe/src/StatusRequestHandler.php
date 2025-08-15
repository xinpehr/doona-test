<?php

declare(strict_types=1);

namespace Aikeedo\ApiFrame;

use Ai\Application\Commands\ReadLibraryItemCommand;
use Ai\Domain\Entities\ImageEntity;
use Ai\Domain\Exceptions\LibraryItemNotFoundException;
use Easy\Http\Message\RequestMethod;
use Easy\Router\Attributes\Route;
use Override;
use Presentation\Exceptions\NotFoundException;
use Presentation\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Shared\Infrastructure\CommandBus\Dispatcher;

/**
 * Handle status check requests for APIFrame tasks
 */
#[Route(path: '/apiframe/status/{id}', method: RequestMethod::GET)]
class StatusRequestHandler implements RequestHandlerInterface
{
    public function __construct(
        private Dispatcher $dispatcher,
        private ImageGeneratorService $service,
    ) {
        error_log("APIFrame StatusRequestHandler: Constructor called - handler is being instantiated");
    }

    #[Override]
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $id = $request->getAttribute('id');
        error_log("APIFrame Status: Checking status for entity ID: " . $id);

        // Find library item by id
        $cmd = new ReadLibraryItemCommand($id);

        try {
            /** @var ImageEntity $entity */
            $entity = $this->dispatcher->dispatch($cmd);
            error_log("APIFrame Status: Entity found, current state: " . $entity->getState()->value);
        } catch (LibraryItemNotFoundException $th) {
            error_log("APIFrame Status: Entity not found: " . $id);
            throw new NotFoundException();
        }

        // Check if this is an APIFrame task
        $taskId = $entity->getMeta('apiframe_task_id');
        if (!$taskId) {
            error_log("APIFrame Status: Not an APIFrame task: " . $id);
            throw new NotFoundException();
        }

        error_log("APIFrame Status: Found APIFrame task ID: " . $taskId);

        // Check current status
        $this->service->checkTaskStatus($entity);

        $response = [
            'status' => $entity->getState()->value,
            'apiframe_status' => $entity->getMeta('apiframe_status'),
            'progress' => $entity->getProgress()->value,
            'completed' => $entity->getState()->value === 'completed',
            'failed' => $entity->getState()->value === 'failed',
            'failure_reason' => $entity->getMeta('apiframe_error'),
        ];

        error_log("APIFrame Status: Returning response: " . json_encode($response));

        // Return status info
        $jsonResponse = new JsonResponse($response);
        
        // Add a special header to indicate this is an APIFrame response
        // This can be used by frontend to inject polling script if needed
        $jsonResponse = $jsonResponse->withHeader('X-APIFrame-Status', 'true');
        
        return $jsonResponse;
    }
}
