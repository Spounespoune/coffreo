<?php

declare(strict_types=1);

namespace App\UseCases\CoffeeMachine\Command;

use App\UseCases\CoffeeMachine\Models\CoffeeMachine;

class ResetCoffeeMachineUseCase
{
    public function __construct(private readonly CoffeeMachine $coffeeMachine)
    {
    }

    public function execute(): void
    {
        $this->coffeeMachine->reset();
    }
}