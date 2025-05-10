<?php

declare(strict_types=1);

namespace App\UseCases\CoffeeMachine\Command;

use App\UseCases\CoffeeMachine\Infrastructure\Mapper\CoffeeMachineMapper;
use App\UseCases\CoffeeMachine\Infrastructure\Repository\CoffeeMachineRepository;
use App\UseCases\CoffeeMachine\Models\CoffeeMachine;

readonly class ResetCoffeeMachineUseCase
{
    public function __construct(
        private CoffeeMachineRepository $coffeeMachineRepository,
        private CoffeeMachine           $coffeeMachine
    )
    {
    }

    public function execute(): void
    {
        $this->coffeeMachine->reset();
        $coffeeMachineEntity = CoffeeMachineMapper::toCoffeeMachineEntity($this->coffeeMachine);
        $this->coffeeMachineRepository->save($coffeeMachineEntity);
    }
}