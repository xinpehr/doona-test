<?php

declare(strict_types=1);

namespace Aikeedo\Runway;

use Ai\Application\Commands\ReadLibraryItemCommand;
use Ai\Domain\Entities\AbstractLibraryItemEntity;
use Ai\Domain\Entities\ImageEntity;
use Ai\Domain\Entities\VideoEntity;
use Ai\Domain\Exceptions\LibraryItemNotFoundException;
use Ai\Domain\Repositories\LibraryItemRepositoryInterface;
use Easy\Http\Message\RequestMethod;
use Easy\Router\Attributes\Route;
use Presentation\Exceptions\NotFoundException;
use Presentation\Response\JsonResponse;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Shared\Infrastructure\CommandBus\Dispatcher;

#[Route(path: '/admin/runway/check-task/[uuid:id]', method: RequestMethod::GET)]
class TaskStatusRequestHandler implements RequestHandlerInterface
{
    public function __construct(
        private Dispatcher $dispatcher,
        private ContainerInterface $container,
        private Client $client,
        private LibraryItemRepositoryInterface $repo,
    ) {}

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $id = $request->getAttribute('id');

        // Find library item by id
        $cmd = new ReadLibraryItemCommand($id);

        try {
            /** @var AbstractLibraryItemEntity $entity */
            $entity = $this->dispatcher->dispatch($cmd);
        } catch (LibraryItemNotFoundException $th) {
            throw new NotFoundException();
        }

        if (!$entity->hasMeta('runway_task_id')) {
            return new JsonResponse([
                'error' => 'No Runway task ID found for this entity',
                'entity_id' => $entity->getId(),
            ]);
        }

        $taskId = $entity->getMeta('runway_task_id');

        try {
            // Check task status from Runway API
            error_log("TaskStatus: Checking task {$taskId} for entity {$entity->getId()}");
            
            $response = $this->client->sendRequest(
                'GET', 
                "/v1/tasks/{$taskId}",
                [],
                [],
                ['X-Runway-Version' => '2024-11-06']
            );
            
            error_log("TaskStatus: Runway API response status: " . $response->getStatusCode());
            $responseBody = $response->getBody()->getContents();
            error_log("TaskStatus: Runway API response: " . $responseBody);
            
            $data = json_decode($responseBody, true);

            // Process the response using appropriate webhook processor
            if ($entity instanceof ImageEntity) {
                $processor = $this->container->get(ImageWebhookProcessor::class);
                $processor($entity, (object)$data);
            } elseif ($entity instanceof VideoEntity) {
                $processor = $this->container->get(VideoWebhookProcessor::class);
                $processor($entity, (object)$data);
            }

            // Save changes
            $this->repo->add($entity);

            return new JsonResponse([
                'success' => true,
                'entity_id' => $entity->getId(),
                'runway_task_id' => $taskId,
                'runway_response' => $data,
                'entity_state' => $entity->getState()->value,
                'output_file' => $entity->getOutputFile() ? $entity->getOutputFile()->getUrl()->value : null,
            ]);

        } catch (\Exception $e) {
            return new JsonResponse([
                'error' => 'Failed to check task status: ' . $e->getMessage(),
                'entity_id' => $entity->getId(),
                'runway_task_id' => $taskId,
            ]);
        }
    }
}
