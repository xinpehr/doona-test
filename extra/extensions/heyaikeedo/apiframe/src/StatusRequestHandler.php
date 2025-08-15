<?php

declare(strict_types=1);

namespace Aikeedo\ApiFrame;

use Ai\Application\Commands\ReadLibraryItemCommand;
use Ai\Domain\Entities\ImageEntity;
use Ai\Domain\Exceptions\LibraryItemNotFoundException;
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
class StatusRequestHandler implements RequestHandlerInterface
{
    public function __construct(
        private Dispatcher $dispatcher,
        private ImageGeneratorService $service,
    ) {}

    #[Override]
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $id = $request->getAttribute('id');

        // Find library item by id
        $cmd = new ReadLibraryItemCommand($id);

        try {
            /** @var ImageEntity $entity */
            $entity = $this->dispatcher->dispatch($cmd);
        } catch (LibraryItemNotFoundException $th) {
            throw new NotFoundException();
        }

        // Check if this is an APIFrame task
        if (!$entity->getMeta('apiframe_task_id')) {
            throw new NotFoundException();
        }

        // Check current status
        $this->service->checkTaskStatus($entity);

        // Return status info
        return new JsonResponse([
            'status' => $entity->getState()->value,
            'apiframe_status' => $entity->getMeta('apiframe_status'),
            'progress' => $entity->getProgress()->value,
            'completed' => $entity->getState()->value === 'completed',
            'failed' => $entity->getState()->value === 'failed',
            'failure_reason' => $entity->getMeta('apiframe_error'),
        ]);
    }
}
