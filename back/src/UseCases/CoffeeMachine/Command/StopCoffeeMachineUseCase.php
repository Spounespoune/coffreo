<?php

declare(strict_types=1);

namespace App\UseCases\CoffeeMachine\Command;

use App\UseCases\CoffeeMachine\Infrastructure\Mapper\CoffeeMachineMapper;
use App\UseCases\CoffeeMachine\Infrastructure\Repository\CoffeeMachineRepository;
use App\UseCases\CoffeeMachine\Models\CoffeeMachine;
use Exception;

readonly class StopCoffeeMachineUseCase
{
    public function __construct(
        private CoffeeMachineRepository $coffeeMachineRepository,
        private CoffeeMachine $coffeeMachine
    )
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
        $coffeeMachineEntity = CoffeeMachineMapper::toCoffeeMachineEntity($this->coffeeMachine);
        $this->coffeeMachineRepository->save($coffeeMachineEntity);
    }
}