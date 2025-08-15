<?php

declare(strict_types=1);

use Aikeedo\ApiFrame\StatusRequestHandler;
use Easy\Router\Attributes\Route;

return [
    new Route(
        'GET',
        '/apiframe/status/{id:[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}}',
        StatusRequestHandler::class
    ),
];
