<?php

declare(strict_types=1);

namespace App\UseCases\CoffeeMachine\Command;

use App\UseCases\CoffeeMachine\Models\CoffeeMachine;
use Exception;

class StopCoffeeMachineUseCase
{
    public function __construct(private readonly CoffeeMachine $coffeeMachine)
    {
    }

    /**
     * @throws Exception
     */
    public function execute(): void
    {
        if (!$this->coffeeMachine->isStarted()) {
            throw new Exception('Coffee machine is already stopped');
        }

        $this->coffeeMachine->stop();
    }
}