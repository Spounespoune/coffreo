<?php

declare(strict_types=1);

namespace App\UseCases\CoffeeMachine\Infrastructure\Repository\Doctrine;

use App\Entity\CoffeeMachine;
use App\UseCases\CoffeeMachine\Infrastructure\Repository\CoffeeMachineRepository as CoffeeMachineRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class CoffeeMachineRepository extends ServiceEntityRepository implements CoffeeMachineRepositoryInterface
{
    public function __construct(private readonly ManagerRegistry $registry)
    {
        parent::__construct($registry, CoffeeMachine::class);
    }

    public function get(): CoffeeMachine
    {
        return $this->findOneBy(['id' => 1]);
    }

    public function save(CoffeeMachine $coffeeMachine): void
    {
        $this->registry->getManager()->persist($coffeeMachine);
        $this->registry->getManager()->flush();
    }
}