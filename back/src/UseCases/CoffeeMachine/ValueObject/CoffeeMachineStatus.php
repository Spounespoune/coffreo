<?php

namespace App\UseCases\CoffeeMachine\ValueObject;

readonly class CoffeeMachineStatus
{
    public function __construct(private string $status)
    {
    }

    public function toArray(): array
    {
        return ['status' => $this->status];
    }
}