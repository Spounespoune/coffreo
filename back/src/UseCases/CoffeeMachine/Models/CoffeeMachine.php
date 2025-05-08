<?php

declare(strict_types=1);

namespace App\UseCases\CoffeeMachine\Models;

use App\UseCases\CoffeeMachine\CoffeeMachineState;

class CoffeeMachine
{
    private CoffeeMachineState $state = CoffeeMachineState::OFF;

    public function isStarted(): bool
    {
        return $this->state === CoffeeMachineState::ON;
    }

    public function isReset(): bool
    {
        return $this->state === CoffeeMachineState::RESET;
    }

    public function start(): void
    {
        $this->state = CoffeeMachineState::ON;
    }

    public function stop(): void
    {
        $this->state = CoffeeMachineState::OFF;
    }

    public function reset(): void
    {
        $this->state = CoffeeMachineState::RESET;
    }
}