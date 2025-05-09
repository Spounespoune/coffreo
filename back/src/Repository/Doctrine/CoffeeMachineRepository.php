<?php

declare(strict_types=1);

namespace App\Repository\Doctrine;

use App\Entity\CoffeeMachine as CoffeeMachineAlias;
use App\UseCases\CoffeeMachine\Models\CoffeeMachine;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class CoffeeMachineRepository extends ServiceEntityRepository implements \App\Repository\CoffeeMachineRepository
{
    public function __construct(private readonly ManagerRegistry $registry)
    {
        parent::__construct($registry, CoffeeMachineAlias::class);
    }

    public function get(): CoffeeMachine
    {
        return $this->findOneBy(['id' => 1]);
    }

    public function save(object $coffeeMachine): void
    {
        $this->registry->getManager()->persist($coffeeMachine);
        $this->registry->getManager()->flush();
    }
}