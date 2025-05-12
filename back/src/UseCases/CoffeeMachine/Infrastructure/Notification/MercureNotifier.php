<?php

declare(strict_types=1);

namespace App\UseCases\CoffeeMachine\Infrastructure\Notification;

use Symfony\Component\Mercure\HubInterface;
use Symfony\Component\Mercure\Update;

readonly class MercureNotifier implements Notifier
{
    public function __construct(private HubInterface $hub)
    {
    }

    public function notify(string $topic, array $data): void
    {
        $update = new Update($topic, json_encode($data));
        $this->hub->publish($update);
    }
}