<?php

declare(strict_types=1);

namespace App\Tests\UseCases\CoffeeMachine;

use App\UseCases\CoffeeMachine\Command\ResetCoffeeMachineUseCase;
use App\UseCases\CoffeeMachine\Infrastructure\Repository\InMemory\InMemoryCoffeeMachineRepository;
use App\UseCases\CoffeeMachine\Models\CoffeeMachine;
use PHPUnit\Framework\TestCase;

class ResetCoffeeMachineUseCaseTest extends TestCase
{
    private InMemoryCoffeeMachineRepository $inMemoryCoffeeMachineRepository;

    protected function setUp(): void
    {
        parent::setUp();
        $this->inMemoryCoffeeMachineRepository = new InMemoryCoffeeMachineRepository();
    }

    public function test_reset_coffee_machine()
    {
        $coffeeMachine = new CoffeeMachine();
        $resetCoffeeMachineUseCase = new ResetCoffeeMachineUseCase($this->inMemoryCoffeeMachineRepository, $coffeeMachine);
        $resetCoffeeMachineUseCase->execute();
        $this->assertTrue($coffeeMachine->isReset());
    }
}
