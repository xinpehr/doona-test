<?php

declare(strict_types=1);

namespace Aikeedo\ApiFrame;

use Ai\Application\Commands\ReadLibraryItemCommand;
use Ai\Domain\Entities\ImageEntity;
use Ai\Domain\Exceptions\LibraryItemNotFoundException;
use Override;
use Presentation\Resources\Api\ImageResource;
use Presentation\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Shared\Infrastructure\CommandBus\Dispatcher;

/**
 * Middleware to intercept library image requests and handle APIFrame polling
 */
class ApiFramePollingMiddleware implements MiddlewareInterface
{
    public function __construct(
        private Dispatcher $dispatcher,
        private ImageGeneratorService $service,
    ) {
        error_log("APIFrame PollingMiddleware: Constructor called - middleware is being instantiated");
    }

    #[Override]
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        // Only handle GET requests to /api/library/images/{id}
        $path = $request->getUri()->getPath();
        $method = $request->getMethod();
        
        error_log("APIFrame PollingMiddleware: Processing request - Method: $method, Path: $path");
        
        if ($method !== 'GET' || !preg_match('#^/api/library/images/([0-9a-f-]+)$#', $path, $matches)) {
            error_log("APIFrame PollingMiddleware: Not a library image request, passing through");
            return $handler->handle($request);
        }

        $id = $matches[1];
        error_log("APIFrame PollingMiddleware: Intercepted library image request for ID: " . $id);

        // Try to fetch the entity
        $cmd = new ReadLibraryItemCommand($id);

        try {
            /** @var ImageEntity $entity */
            $entity = $this->dispatcher->dispatch($cmd);
            error_log("APIFrame PollingMiddleware: Entity found, current state: " . $entity->getState()->value);
        } catch (LibraryItemNotFoundException $th) {
            error_log("APIFrame PollingMiddleware: Entity not found, passing to original handler");
            return $handler->handle($request);
        }

        // Check if this is an APIFrame entity
        $taskId = $entity->getMeta('apiframe_task_id');
        if (!$taskId) {
            error_log("APIFrame PollingMiddleware: Not an APIFrame entity, passing to original handler");
            return $handler->handle($request);
        }

        error_log("APIFrame PollingMiddleware: Found APIFrame entity, checking status for task: " . $taskId);
        
        // Update the status
        $this->service->checkTaskStatus($entity);
        error_log("APIFrame PollingMiddleware: Status check completed, returning updated entity");

        // Return the updated entity
        $resource = new ImageResource($entity);
        return new JsonResponse($resource);
    }
}
