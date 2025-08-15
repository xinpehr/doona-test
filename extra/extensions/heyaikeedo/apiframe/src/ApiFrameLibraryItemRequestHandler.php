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
use Presentation\Resources\Api\ImageResource;
use Presentation\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Shared\Infrastructure\CommandBus\Dispatcher;

/**
 * Override library item handler specifically for APIFrame entities
 * This handles polling for APIFrame tasks by checking status before returning entity
 */
#[Route(path: '/library/images/{id}', method: RequestMethod::GET)]
class ApiFrameLibraryItemRequestHandler implements RequestHandlerInterface
{
    public function __construct(
        private Dispatcher $dispatcher,
        private ImageGeneratorService $service,
    ) {
        error_log("APIFrame ApiFrameLibraryItemRequestHandler: Constructor called - handler is being instantiated");
    }

    #[Override]
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $id = $request->getAttribute('id');
        error_log("APIFrame ApiFrameLibraryItemRequestHandler: Handling request for ID: " . $id);

        // Find library item by id
        $cmd = new ReadLibraryItemCommand($id);

        try {
            /** @var ImageEntity $entity */
            $entity = $this->dispatcher->dispatch($cmd);
            error_log("APIFrame ApiFrameLibraryItemRequestHandler: Entity found, current state: " . $entity->getState()->value);
        } catch (LibraryItemNotFoundException $th) {
            error_log("APIFrame ApiFrameLibraryItemRequestHandler: Entity not found: " . $id);
            throw new NotFoundException();
        }

        // Check if this is an APIFrame entity and update status if needed
        $taskId = $entity->getMeta('apiframe_task_id');
        if ($taskId) {
            error_log("APIFrame ApiFrameLibraryItemRequestHandler: Found APIFrame task, checking status for: " . $taskId);
            $this->service->checkTaskStatus($entity);
            error_log("APIFrame ApiFrameLibraryItemRequestHandler: Status check completed");
        }

        // Return the entity as ImageResource (same as original handler)
        $resource = new ImageResource($entity);
        return new JsonResponse($resource);
    }
}
