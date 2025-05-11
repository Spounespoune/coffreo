<?php

declare(strict_types=1);

namespace App\UseCases\CoffeeMachine\Command;

use App\Entity\CoffeeMachine as CoffeeMachineEntity;
use App\UseCases\CoffeeMachine\Infrastructure\Mapper\CoffeeMachineMapper;
use App\UseCases\CoffeeMachine\Infrastructure\Repository\CoffeeMachineRepository;
use App\UseCases\CoffeeMachine\Models\CoffeeMachine as CoffeeMachineModel;
use Exception;

readonly class StopCoffeeMachineUseCase
{
    public function __construct(
        private CoffeeMachineRepository $coffeeMachineRepository,
        private CoffeeMachineModel      $coffeeMachineModel,
        private CoffeeMachineEntity     $coffeeMachineEntity
    )
    {
    }

    /**
     * @throws Exception
     */
    public function execute(): void
    {
        if (!$this->coffeeMachineModel->isStarted()) {
            throw new Exception('Coffee machine is already stopped');
        }

        $this->coffeeMachineModel->stop();
        $coffeeMachineEntity = CoffeeMachineMapper::updateCoffeeMachineEntity($this->coffeeMachineEntity, $this->coffeeMachineModel);
        $this->coffeeMachineRepository->save($coffeeMachineEntity);
    }
}