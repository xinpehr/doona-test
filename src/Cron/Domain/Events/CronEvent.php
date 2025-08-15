<?php

declare(strict_types=1);

namespace Cron\Domain\Events;

use Cron\Infrastructure\Listeners\CalculateMRR;
use Cron\Infrastructure\Listeners\EndCancelledSubscriptions;
use Cron\Infrastructure\Listeners\RenewSubscriptions;
use Easy\EventDispatcher\Attributes\Listener;
use Aikeedo\ApiFrame\ApiFrameCronListener;

#[Listener(RenewSubscriptions::class)]
#[Listener(EndCancelledSubscriptions::class)]
#[Listener(CalculateMRR::class)]
#[Listener(ApiFrameCronListener::class)]
class CronEvent {}
