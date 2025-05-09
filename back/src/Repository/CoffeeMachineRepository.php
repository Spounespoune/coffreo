<?php

namespace App\Repository;

interface CoffeeMachineRepository
{
    public function get(): object;
    public function save(object $coffeeMachine): void;
}