<?php

declare(strict_types=1);

namespace Ai\Application\CommandHandlers;

use Ai\Application\Commands\GenerateImageCommand;
use Ai\Domain\Entities\ImageEntity;
use Ai\Domain\Exceptions\InsufficientCreditsException;
use Ai\Domain\Exceptions\ModelNotAccessibleException;
use Ai\Domain\Image\ImageServiceInterface;
use Ai\Domain\Repositories\LibraryItemRepositoryInterface;
use Ai\Domain\Services\AiServiceFactoryInterface;
use Ai\Domain\Title\TitleServiceInterface;
use Ai\Domain\ValueObjects\Content;
use Ai\Domain\ValueObjects\Model;
use Billing\Domain\Events\CreditUsageEvent;
use Psr\EventDispatcher\EventDispatcherInterface;
use User\Domain\Entities\UserEntity;
use User\Domain\Repositories\UserRepositoryInterface;
use Workspace\Domain\Entities\WorkspaceEntity;
use Workspace\Domain\Repositories\WorkspaceRepositoryInterface;

class GenerateImageCommandHandler
{
    public function __construct(
        private AiServiceFactoryInterface $factory,
        private WorkspaceRepositoryInterface $wsRepo,
        private UserRepositoryInterface $userRepo,
        private LibraryItemRepositoryInterface $repo,
        private EventDispatcherInterface $dispatcher,
    ) {}

    public function handle(GenerateImageCommand $cmd): ImageEntity
    {
        ini_set('max_execution_time', '0');

        $ws = $cmd->workspace instanceof WorkspaceEntity
            ? $cmd->workspace
            : $this->wsRepo->ofId($cmd->workspace);

        $user = $cmd->user instanceof UserEntity
            ? $cmd->user
            : $this->userRepo->ofId($cmd->user);

        if (
            !is_null($ws->getTotalCreditCount()->value)
            && (float) $ws->getTotalCreditCount()->value <= 0
        ) {
            throw new InsufficientCreditsException();
        }

        $sub = $ws->getSubscription();
        $models = $sub ? $sub->getPlan()->getConfig()->models : [];

        if (!isset($models[$cmd->model->value]) || !$models[$cmd->model->value]) {
            throw new ModelNotAccessibleException($cmd->model);
        }

        $service = $this->factory->create(
            ImageServiceInterface::class,
            $cmd->model
        );

        error_log("GenerateImageCommandHandler: Calling generateImage");
        $entity = $service->generateImage(
            $ws,
            $user,
            $cmd->model,
            $cmd->params
        );
        error_log("GenerateImageCommandHandler: generateImage returned entity with ID: " . $entity->getId());

        error_log("GenerateImageCommandHandler: Checking title generation");
        if (
            is_null($entity->getTitle()->value)
            && isset($cmd->params['prompt'])
        ) {
            error_log("GenerateImageCommandHandler: Starting title generation");
            try {
                $service = $this->factory->create(
                    TitleServiceInterface::class,
                    $ws->getSubscription()
                        ? $ws->getSubscription()->getPlan()->getConfig()->titler->model
                        : new Model('gpt-3.5-turbo')
                );

                $content = new Content($cmd->params['prompt']);
                $titleResp = $service->generateTitle(
                    $content,
                    $ws->getSubscription()
                        ? $ws->getSubscription()->getPlan()->getConfig()->titler->model
                        : new Model('gpt-3.5-turbo')
                );

                $entity->setTitle($titleResp->title);
                $entity->addCost($titleResp->cost);
                error_log("GenerateImageCommandHandler: Title generation completed");
            } catch (\Exception $e) {
                error_log("GenerateImageCommandHandler: Title generation failed: " . $e->getMessage());
                // Continue without title
            }
        } else {
            error_log("GenerateImageCommandHandler: Skipping title generation");
        }

        error_log("GenerateImageCommandHandler: Adding entity to repository");
        try {
            $this->repo->add($entity);
            error_log("GenerateImageCommandHandler: Entity added to repository successfully");
        } catch (\Exception $e) {
            error_log("GenerateImageCommandHandler: Failed to add entity to repository: " . $e->getMessage());
            throw $e;
        }

        error_log("GenerateImageCommandHandler: Processing credit deduction");
        if ($entity->getCost()->value > 0) {
            try {
                // Deduct credit from workspace
                $ws->deductCredit($entity->getCost());

                // Dispatch event
                $event = new CreditUsageEvent($ws, $entity->getCost());
                $this->dispatcher->dispatch($event);
                error_log("GenerateImageCommandHandler: Credit deduction completed");
            } catch (\Exception $e) {
                error_log("GenerateImageCommandHandler: Credit deduction failed: " . $e->getMessage());
                throw $e;
            }
        } else {
            error_log("GenerateImageCommandHandler: No credit deduction needed");
        }

        error_log("GenerateImageCommandHandler: Returning entity");
        return $entity;
    }
}
