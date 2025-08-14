<?php

declare(strict_types=1);

namespace Aikeedo\ApiFrame;

use Easy\Http\Message\RequestMethod;
use Easy\Router\Attributes\Route;
use Override;
use Presentation\RequestHandlers\Admin\AbstractAdminViewRequestHandler;
use Presentation\Response\ViewResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

/**
 * APIFrame Settings Request Handler
 * 
 * Handles the settings page for APIFrame plugin configuration.
 * Allows admins to configure API keys and other settings.
 */
#[Route(path: '/settings/apiframe', method: RequestMethod::GET)]
class SettingsRequestHandler extends AbstractAdminViewRequestHandler implements
    RequestHandlerInterface
{
    #[Override]
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        // Return the settings template with APIFrame namespace
        return new ViewResponse('@apiframe/settings.twig');
    }
}
