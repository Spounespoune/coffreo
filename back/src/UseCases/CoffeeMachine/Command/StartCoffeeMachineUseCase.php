<?php

declare(strict_types=1);

namespace App\UseCases\CoffeeMachine\Command;

use App\Entity\CoffeeMachine;
use Exception;

class StartCoffeeMachineUseCase
{
    public function __construct(private readonly CoffeeMachine $coffeeMachine)
    {
    }

    /**
     * @throws Exception
     */
    public function execute(): void
    {
        if ($this->coffeeMachine->isStarted()) {
            throw new Exception('Coffee machine is already started');
        }

        $this->coffeeMachine->start();
    }
}