<?php

declare(strict_types=1);

namespace App\UseCases\CoffeeMachine\Infrastructure\Repository;

use App\Entity\CoffeeMachine;

interface CoffeeMachineRepository
{
    public function get(): CoffeeMachine;
    public function save(CoffeeMachine $coffeeMachine): void;
}