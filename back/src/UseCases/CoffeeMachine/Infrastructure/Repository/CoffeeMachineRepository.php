<?php

declare(strict_types=1);

namespace App\UseCases\CoffeeMachine\Infrastructure\Repository;

use App\Entity\CoffeeMachine as CoffeeMachineEntity;
use App\UseCases\CoffeeMachine\Models\CoffeeMachine;

interface CoffeeMachineRepository
{
    public function get(): CoffeeMachine;
    public function save(CoffeeMachineEntity $coffeeMachine): void;
}