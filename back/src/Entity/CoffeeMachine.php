<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\Doctrine\CoffeeMachineRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CoffeeMachineRepository::class)]
class CoffeeMachine
{
    #[ORM\Id]
    #[ORM\Column]
    private int $id;
    #[ORM\Column(type: 'string', length: 50)]
    private string $state;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): CoffeeMachine
    {
        $this->id = $id;
        return $this;
    }

    public function getState(): string
    {
        return $this->state;
    }

    public function setState(string $state): CoffeeMachine
    {
        $this->state = $state;
        return $this;
    }

}