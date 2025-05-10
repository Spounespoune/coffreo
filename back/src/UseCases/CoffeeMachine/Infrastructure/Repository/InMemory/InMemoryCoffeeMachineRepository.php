<?php

namespace App\UseCases\CoffeeMachine\Infrastructure\Repository\InMemory;

use App\Entity\CoffeeMachine as CoffeeMachineEntity;
use App\UseCases\CoffeeMachine\Infrastructure\Repository\CoffeeMachineRepository;
use App\UseCases\CoffeeMachine\Models\CoffeeMachine;

class InMemoryCoffeeMachineRepository implements CoffeeMachineRepository
{
    private CoffeeMachineEntity $coffeeMachineEntity;

    public function get(): CoffeeMachine
    {
        return new CoffeeMachine();
    }

    public function save(CoffeeMachineEntity $coffeeMachine): void
    {
        $this->coffeeMachineEntity = $coffeeMachine;
    }
}