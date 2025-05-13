<?php

declare(strict_types=1);

namespace App\UseCases\CoffeeMachine\Handler;

use App\UseCases\CoffeeMachine\Infrastructure\Notification\Notifier;
use App\UseCases\CoffeeMachine\ValueObject\CoffeeMachineStatus;

readonly class NotifierStatusHandler
{
    public function __construct(private Notifier $notifier)
    {
    }

    public function handle(CoffeeMachineStatus $coffeeMachineStatus): void
    {
        $this->notifier->notify('coffee-machine/status', $coffeeMachineStatus->toArray());
    }
}