<?php

declare(strict_types=1);

namespace App\UseCases\CoffeeMachine\Handler;

use App\UseCases\CoffeeMachine\Infrastructure\Notification\Notifier;

readonly class NotifierStatusHandler
{
    public function __construct(private Notifier $notifier)
    {
    }

    public function handle(array $data): void
    {
        $this->notifier->notify('coffee-machine/status', $data);
    }
}