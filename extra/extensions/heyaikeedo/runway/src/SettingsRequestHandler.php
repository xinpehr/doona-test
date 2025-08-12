<?php

declare(strict_types=1);

namespace Aikeedo\Runway;

use Easy\Http\Message\RequestMethod;
use Easy\Router\Attributes\Route;
use Override;
use Presentation\RequestHandlers\Admin\AbstractAdminViewRequestHandler;
use Presentation\Response\ViewResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

/**
 * Settings request handler for Runway API configuration.
 * 
 * This request handler displays the settings page for the Runway API plugin
 * where administrators can configure their API key and other settings.
 */
#[Route(path: '/settings/runway', method: RequestMethod::GET)]
class SettingsRequestHandler extends AbstractAdminViewRequestHandler implements
    RequestHandlerInterface
{
    #[Override]
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        // Return the settings template view
        // @runway is the namespace we've added in the Plugin class
        return new ViewResponse('@runway/settings.twig');
    }
}
