<?php

declare(strict_types=1);

namespace Cron\Domain\Events;

use Aikeedo\ApiFrame\ApiFrameTaskChecker;
use Cron\Infrastructure\Listeners\CalculateMRR;
use Cron\Infrastructure\Listeners\EndCancelledSubscriptions;
use Cron\Infrastructure\Listeners\RenewSubscriptions;
use Easy\EventDispatcher\Attributes\Listener;

#[Listener(RenewSubscriptions::class)]
#[Listener(EndCancelledSubscriptions::class)]
#[Listener(CalculateMRR::class)]
#[Listener(ApiFrameTaskChecker::class)]
class CronEvent {}
