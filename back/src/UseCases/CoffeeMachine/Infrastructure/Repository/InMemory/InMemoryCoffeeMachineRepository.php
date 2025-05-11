<?php

namespace App\UseCases\CoffeeMachine\Infrastructure\Repository\InMemory;

use App\Entity\CoffeeMachine;
use App\UseCases\CoffeeMachine\Infrastructure\Repository\CoffeeMachineRepository;

class InMemoryCoffeeMachineRepository implements CoffeeMachineRepository
{
    private CoffeeMachine $coffeeMachineEntity;

    public function get(): CoffeeMachine
    {
        return new CoffeeMachine();
    }

    public function save(CoffeeMachine $coffeeMachine): void
    {
        $this->coffeeMachineEntity = $coffeeMachine;
    }
}