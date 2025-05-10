<?php

declare(strict_types=1);

namespace App\Tests\UseCases\CoffeeMachine;

use App\UseCases\CoffeeMachine\Command\StartCoffeeMachineUseCase;
use App\UseCases\CoffeeMachine\Command\StopCoffeeMachineUseCase;
use App\UseCases\CoffeeMachine\Infrastructure\Repository\InMemory\InMemoryCoffeeMachineRepository;
use App\UseCases\CoffeeMachine\Models\CoffeeMachine;
use Exception;
use PHPUnit\Framework\TestCase;

class StopCoffeeMachineUseCaseTest extends TestCase
{
    private InMemoryCoffeeMachineRepository $inMemoryCoffeeMachineRepository;

    protected function setUp(): void
    {
        parent::setUp();
        $this->inMemoryCoffeeMachineRepository = new InMemoryCoffeeMachineRepository();
    }

    /**
     * @throws Exception
     */
    public function test_stop_coffee_machine()
    {
        $coffeeMachine = new CoffeeMachine();
        $startCoffeeMachineUseCase = new StartCoffeeMachineUseCase($this->inMemoryCoffeeMachineRepository, $coffeeMachine);
        $stopCoffeeMachineUseCase = new StopCoffeeMachineUseCase($this->inMemoryCoffeeMachineRepository, $coffeeMachine);
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
        $stopCoffeeMachineUseCase = new StopCoffeeMachineUseCase($this->inMemoryCoffeeMachineRepository, $coffeeMachine);
        $this->expectException(Exception::class);
        $stopCoffeeMachineUseCase->execute();
    }
}
