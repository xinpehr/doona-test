<?php

declare(strict_types=1);

namespace Aikeedo\ApiFrame;

use Ai\Application\Commands\ReadLibraryItemCommand;
use Ai\Domain\Entities\AbstractLibraryItemEntity;
use Ai\Domain\Entities\ImageEntity;
use Ai\Domain\Exceptions\LibraryItemNotFoundException;
use Easy\Http\Message\RequestMethod;
use Easy\Http\Message\StatusCode;
use Easy\Router\Attributes\Middleware;
use Easy\Router\Attributes\Route;
use Presentation\Exceptions\HttpException;
use Presentation\Exceptions\NotFoundException;
use Presentation\Middlewares\ExceptionMiddleware;
use Presentation\Response\EmptyResponse;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Shared\Infrastructure\CommandBus\Dispatcher;

/**
 * APIFrame Webhook Request Handler
 * 
 * Handles incoming webhooks from APIFrame API for image generation status updates.
 * Validates webhook authenticity using secrets and processes completed images.
 */
#[Middleware(ExceptionMiddleware::class)]
#[Route(path: '/webhooks/apiframe/[uuid:id]', method: RequestMethod::POST)]
class WebhookRequestHandler implements RequestHandlerInterface
{
    public function __construct(
        private Dispatcher $dispatcher,
        private ContainerInterface $container,
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

        // Validate entity type
        if (!($entity instanceof ImageEntity)) {
            throw new NotFoundException();
        }

        $contents = $request->getBody()->getContents();
        $data = json_decode($contents);

        if (!$data) {
            throw new HttpException(
                'Invalid request payload',
                StatusCode::BAD_REQUEST
            );
        }

        // Validate webhook secret
        $providedSecret = $request->getHeaderLine('x-webhook-secret');
        $expectedSecret = $entity->getMeta('apiframe_webhook_secret');

        if (!$providedSecret || !$expectedSecret || !hash_equals($expectedSecret, $providedSecret)) {
            throw new HttpException(
                'Invalid webhook secret',
                StatusCode::UNAUTHORIZED
            );
        }

        // Validate task_id matches
        if (
            !isset($data->task_id)
            || $data->task_id !== $entity->getMeta('apiframe_task_id')
        ) {
            throw new HttpException(
                'Invalid task ID',
                StatusCode::BAD_REQUEST
            );
        }

        // Process the webhook
        $processor = $this->container->get(ImageWebhookProcessor::class);
        $processor($entity, $data);

        return new EmptyResponse();
    }
}
