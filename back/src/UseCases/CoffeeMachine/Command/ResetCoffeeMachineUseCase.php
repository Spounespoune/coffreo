<?php

declare(strict_types=1);

namespace App\UseCases\CoffeeMachine\Command;

use App\Entity\CoffeeMachine as CoffeeMachineEntity;
use App\UseCases\CoffeeMachine\Infrastructure\Mapper\CoffeeMachineMapper;
use App\UseCases\CoffeeMachine\Infrastructure\Repository\CoffeeMachineRepository;
use App\UseCases\CoffeeMachine\Models\CoffeeMachine as CoffeeMachineModel;

/*
 * WIP
 */
readonly class ResetCoffeeMachineUseCase
{
    public function __construct(
        private CoffeeMachineRepository $coffeeMachineRepository,
        private CoffeeMachineModel      $coffeeMachineModel,
        private CoffeeMachineEntity     $coffeeMachineEntity
    )
    {
    }

    public function execute(): void
    {
        $this->coffeeMachineModel->reset();
        $coffeeMachineEntity = CoffeeMachineMapper::updateCoffeeMachineEntity($this->coffeeMachineEntity, $this->coffeeMachineModel);
        $this->coffeeMachineRepository->save($coffeeMachineEntity);
    }
}