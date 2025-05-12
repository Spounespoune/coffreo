<?php

declare(strict_types=1);

namespace App\Tests\UseCases\CoffeeMachine;

use App\UseCases\CoffeeMachine\Command\StartCoffeeMachineUseCase;
use App\UseCases\CoffeeMachine\Handler\NotifierStatusHandler;
use App\UseCases\CoffeeMachine\Infrastructure\Notification\FakeNotifier;
use App\UseCases\CoffeeMachine\Infrastructure\Repository\Doctrine\CoffeeMachineRepository;
use App\UseCases\CoffeeMachine\Infrastructure\Repository\InMemory\InMemoryCoffeeMachineRepository;
use App\UseCases\CoffeeMachine\Models\CoffeeMachine;
use Exception;
use PHPUnit\Framework\TestCase;

class StartCoffeeMachineUseCaseTest extends TestCase
{
    private InMemoryCoffeeMachineRepository $inMemoryCoffeeMachineRepository;
    private NotifierStatusHandler $notifierStatusHandler;

    protected function setUp(): void
    {
        parent::setUp();
        $this->inMemoryCoffeeMachineRepository = new InMemoryCoffeeMachineRepository();
        $this->fakeNotifier = new FakeNotifier();
        $this->notifierStatusHandler = new NotifierStatusHandler($this->fakeNotifier);
    }

    /**
     * @throws Exception
     */
    public function test_start_coffee_machine()
    {
        $coffeeMachineEntity = $this->inMemoryCoffeeMachineRepository->get();
        $coffeeMachineModel = new CoffeeMachine();
        $startCoffeeMachineUseCase = new StartCoffeeMachineUseCase(
            $this->inMemoryCoffeeMachineRepository,
            $coffeeMachineModel,
            $coffeeMachineEntity,
            $this->notifierStatusHandler,
        );
        $startCoffeeMachineUseCase->execute();
        $this->assertTrue($coffeeMachineModel->isStarted());
    }

    /**
     * @throws Exception
     */
    public function test_start_coffee_machine_twice()
    {
        $coffeeMachineEntity = $this->inMemoryCoffeeMachineRepository->get();
        $coffeeMachineModel = new CoffeeMachine();
        $startCoffeeMachineUseCase = new StartCoffeeMachineUseCase(
            $this->inMemoryCoffeeMachineRepository,
            $coffeeMachineModel,
            $coffeeMachineEntity,
            $this->notifierStatusHandler,
        );
        $startCoffeeMachineUseCase->execute();
        $this->expectException(Exception::class);
        $startCoffeeMachineUseCase->execute();

    }
}
