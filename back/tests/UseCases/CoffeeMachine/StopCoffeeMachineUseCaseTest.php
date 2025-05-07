<?php

declare(strict_types=1);

namespace App\Tests\UsesCases\CoffeeMachine;

use App\Entity\CoffeeMachine;
use App\UseCases\CoffeeMachine\Command\StartCoffeeMachineUseCase;
use App\UseCases\CoffeeMachine\Command\StopCoffeeMachineUseCase;
use Exception;
use PHPUnit\Framework\TestCase;

class StopCoffeeMachineUseCaseTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function test_stop_coffee_machine()
    {
        $coffeeMachine = new CoffeeMachine();
        $startCoffeeMachineUseCase = new StartCoffeeMachineUseCase($coffeeMachine);
        $stopCoffeeMachineUseCase = new StopCoffeeMachineUseCase($coffeeMachine);
        $startCoffeeMachineUseCase->execute();
        $stopCoffeeMachineUseCase->execute();
        $this->assertFalse($coffeeMachine->isStarted());
    }

    /**
     * @throws Exception
     */
    public function test_start_coffee_machine_twice()
    {
        $coffeeMachine = new CoffeeMachine();
        $stopCoffeeMachineUseCase = new StopCoffeeMachineUseCase($coffeeMachine);
        $this->expectException(Exception::class);
        $stopCoffeeMachineUseCase->execute();
    }
}
