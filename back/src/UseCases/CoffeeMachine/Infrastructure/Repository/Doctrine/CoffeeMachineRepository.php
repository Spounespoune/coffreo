<?php

declare(strict_types=1);

namespace App\UseCases\CoffeeMachine\Infrastructure\Repository\Doctrine;

use App\Entity\CoffeeMachine as CoffeeMachineAlias;
use App\Entity\CoffeeMachine as CoffeeMachineEntity;
use App\UseCases\CoffeeMachine\Infrastructure\Mapper\CoffeeMachineMapper;
use App\UseCases\CoffeeMachine\Models\CoffeeMachine;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class CoffeeMachineRepository extends ServiceEntityRepository implements \App\UseCases\CoffeeMachine\Infrastructure\Repository\CoffeeMachineRepository
{
    public function __construct(
        private readonly ManagerRegistry $registry,
        private readonly CoffeeMachineMapper $coffeeMachineMapper
    ){
        parent::__construct($registry, CoffeeMachineAlias::class);
    }

    public function get(): CoffeeMachine
    {
        $coffeeMachineEntity = $this->findOneBy(['id' => 1]);
        return $this->coffeeMachineMapper->toCoffeeMachineModel($coffeeMachineEntity);
    }

    public function save(CoffeeMachineEntity $coffeeMachine): void
    {
        $this->registry->getManager()->persist($coffeeMachine);
        $this->registry->getManager()->flush();
    }
}