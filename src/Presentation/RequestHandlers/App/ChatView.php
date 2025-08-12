<?php

declare(strict_types=1);

namespace Presentation\RequestHandlers\App;

use Ai\Application\Commands\ReadLibraryItemCommand;
use Ai\Domain\Entities\AbstractLibraryItemEntity;
use Ai\Domain\Entities\ConversationEntity;
use Ai\Domain\Exceptions\LibraryItemNotFoundException;
use Assistant\Application\Commands\ReadAssistantCommand;
use Assistant\Domain\Entities\AssistantEntity;
use Assistant\Domain\Exceptions\AssistantNotFoundException;
use Easy\Container\Attributes\Inject;
use Easy\Http\Message\RequestMethod;
use Easy\Router\Attributes\Route;
use Presentation\AccessControls\LibraryItemAccessControl;
use Presentation\AccessControls\Permission;
use Presentation\Resources\Api\AssistantResource;
use Presentation\Resources\Api\ConversationResource;
use Presentation\Response\RedirectResponse;
use Presentation\Response\ViewResponse;
use Preset\Domain\Placeholder\ParserService;
use Preset\Domain\Placeholder\PlaceholderFactory;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Shared\Infrastructure\CommandBus\Dispatcher;
use User\Domain\Entities\UserEntity;

#[Route(path: '/chat/[uuid:id]?', method: RequestMethod::GET)]
class ChatView  extends AppView implements
    RequestHandlerInterface
{
    public function __construct(
        private Dispatcher $dispatcher,
        private ParserService $parser,
        private PlaceholderFactory $factory,
        private LibraryItemAccessControl $ac,

        #[Inject('option.features.chat.is_enabled')]
        private bool $isEnabled = false
    ) {}

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        if (!$this->isEnabled) {
            return new RedirectResponse('/app');
        }

        /** @var UserEntity */
        $user = $request->getAttribute(UserEntity::class);

        $id = $request->getAttribute('id');

        if (!$id) {
            return new ViewResponse('/templates/app/chat.twig');
        }

        $data = [];
        $conversation = null;
        $assistant = null;

        // First check if the ID belongs to a document
        $cmd = new ReadLibraryItemCommand($id);

        try {
            /** @var AbstractLibraryItemEntity */
            $conversation = $this->dispatcher->dispatch($cmd);

            if (
                !($conversation instanceof ConversationEntity)
                || !$this->ac->isGranted(Permission::LIBRARY_ITEM_READ, $user, $conversation)
            ) {
                return new RedirectResponse('/app/assistants');
            }

            $data['conversation'] = new ConversationResource(
                $conversation,
                ['messages']
            );

            $last = $conversation->getLastMessage();

            if ($last) {
                if ($last->getAssistant()) {
                    $data['assistant'] = new AssistantResource($last->getAssistant());
                }

                $data['model'] = $last->getModel()->value;
            }
        } catch (LibraryItemNotFoundException $th) {
            // Do nothing
        }

        if (!$conversation) {
            $cmd = new ReadAssistantCommand($id);

            try {
                /** @var AssistantEntity $assistant */
                $assistant = $this->dispatcher->dispatch($cmd);
                $data['assistant'] = new AssistantResource($assistant);
            } catch (AssistantNotFoundException $th) {
                // Neither conversation nor assistant found
                return new RedirectResponse('/app/assistants');
            }
        }

        return new ViewResponse(
            '/templates/app/chat.twig',
            $data
        );
    }
}
