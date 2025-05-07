<?php

declare(strict_types=1);

namespace App\Tests\UsesCases\CoffeeMachine;

use App\Entity\CoffeeMachine;
use App\UseCases\CoffeeMachine\Command\ResetCoffeeMachineUseCase;
use PHPUnit\Framework\TestCase;

class ResetCoffeeMachineUseCaseTest extends TestCase
{
    public function test_reset_coffee_machine()
    {
        $coffeeMachine = new CoffeeMachine();
        $resetCoffeeMachineUseCase = new ResetCoffeeMachineUseCase($coffeeMachine);
        $resetCoffeeMachineUseCase->execute();
        $this->assertTrue($coffeeMachine->isReset());
    }
}
