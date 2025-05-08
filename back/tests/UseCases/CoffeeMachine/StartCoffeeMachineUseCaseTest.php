<?php

declare(strict_types=1);

namespace App\Tests\UsesCases\CoffeeMachine;

use App\UseCases\CoffeeMachine\Command\StartCoffeeMachineUseCase;
use App\UseCases\CoffeeMachine\Models\CoffeeMachine;
use Exception;
use PHPUnit\Framework\TestCase;

class StartCoffeeMachineUseCaseTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function test_start_coffee_machine()
    {
        $coffeeMachine = new CoffeeMachine();
        $startCoffeeMachineUseCase = new StartCoffeeMachineUseCase($coffeeMachine);
        $startCoffeeMachineUseCase->execute();
        $this->assertTrue($coffeeMachine->isStarted());
    }

    /**
     * @throws Exception
     */
    public function test_start_coffee_machine_twice()
    {
        $coffeeMachine = new CoffeeMachine();
        $startCoffeeMachineUseCase = new StartCoffeeMachineUseCase($coffeeMachine);
        $startCoffeeMachineUseCase->execute();
        $this->expectException(Exception::class);
        $startCoffeeMachineUseCase->execute();

    }
}
