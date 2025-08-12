<?php

declare(strict_types=1);

namespace Presentation\RequestHandlers\Admin;

use Easy\Router\Attributes\Middleware;
use Presentation\Middlewares\DemoEnvironmentMiddleware;
use Presentation\Middlewares\ViewMiddleware;

#[Middleware(DemoEnvironmentMiddleware::class)]
#[Middleware(ViewMiddleware::class)]
class AbstractAdminViewRequestHandler extends AbstractAdminRequestHandler {}
