<?php

namespace App\UseCases\CoffeeMachine\Infrastructure\Mapper;

use App\Entity\CoffeeMachine as CoffeeMachineEntity;
use App\UseCases\CoffeeMachine\CoffeeMachineState;
use App\UseCases\CoffeeMachine\Models\CoffeeMachine as CoffeeMachineModel;

class CoffeeMachineMapper
{
    public static function toCoffeeMachineModel(CoffeeMachineEntity $coffeeMachineEntity): CoffeeMachineModel
    {
        $coffeeMachineModel = new CoffeeMachineModel();

        switch ($coffeeMachineEntity->getState()) {
            case CoffeeMachineState::ON:
                $coffeeMachineModel->start();
                break;
            case CoffeeMachineState::RESET:
                $coffeeMachineModel->reset();
                break;
            default:
                $coffeeMachineModel->stop();
                break;
        }


        return new CoffeeMachineModel();
    }

    public static function toCoffeeMachineEntity(CoffeeMachineModel $coffeeMachineModel): CoffeeMachineEntity
    {
        $coffeeMachineEntity = new CoffeeMachineEntity();

        if ($coffeeMachineModel->isStarted()) {
            $coffeeMachineEntity->setState(CoffeeMachineState::ON->value);
            return $coffeeMachineEntity;
        }

        if ($coffeeMachineModel->isReset()) {
            $coffeeMachineEntity->setState(CoffeeMachineState::RESET->value);
            return $coffeeMachineEntity;
        }

        $coffeeMachineEntity->setState(CoffeeMachineState::OFF->value);
        return $coffeeMachineEntity;
    }
}