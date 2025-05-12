<?php

declare(strict_types=1);

namespace App\UseCases\CoffeeMachine\Infrastructure\Notification;

interface Notifier
{
    public function notify(string $topic, array $data): void;
}