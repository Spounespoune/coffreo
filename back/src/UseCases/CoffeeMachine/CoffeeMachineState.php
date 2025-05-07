<?php

namespace App\UseCases\CoffeeMachine;

enum CoffeeMachineState: string
{
    case OFF = 'off';
    case ON = 'on';
    case RESET = 'reset';
}
