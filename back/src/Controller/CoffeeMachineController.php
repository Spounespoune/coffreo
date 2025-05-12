<?php

declare(strict_types=1);

namespace App\Controller;

use App\UseCases\CoffeeMachine\Command\ResetCoffeeMachineUseCase;
use App\UseCases\CoffeeMachine\Command\StartCoffeeMachineUseCase;
use App\UseCases\CoffeeMachine\Command\StopCoffeeMachineUseCase;
use App\UseCases\CoffeeMachine\Handler\NotifierStatusHandler;
use App\UseCases\CoffeeMachine\Infrastructure\Mapper\CoffeeMachineMapper;
use App\UseCases\CoffeeMachine\Infrastructure\Repository\CoffeeMachineRepository;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CoffeeMachineController extends AbstractController
{
    public function __construct(
        private readonly CoffeeMachineMapper $coffeeMachineMapper,
        private readonly NotifierStatusHandler $notifierStatusHandler
    )
    {
    }

    #[Route('/coffee-machine/state', name: 'app_coffee_machine', methods: ['GET'])]
    public function index(CoffeeMachineRepository $coffeeMachineRepository): Response
    {
        return new JsonResponse($coffeeMachineRepository->get()->getState(), 200);
    }


    /**
     * @throws Exception
     */
    #[Route('/coffee-machine/start', name: 'app_coffee_machine_start', methods: ['POST'])]
    public function startCoffeeMachine(
        CoffeeMachineRepository $coffeeMachineRepository,
    ): Response {
        $coffeeMachineEntity = $coffeeMachineRepository->get();
        $coffeeMachineModel = $this->coffeeMachineMapper->toCoffeeMachineModel($coffeeMachineEntity);
        $startCoffeeMachineUseCase = new StartCoffeeMachineUseCase(
            $coffeeMachineRepository,
            $coffeeMachineModel,
            $coffeeMachineEntity,
            $this->notifierStatusHandler,
        );
        $startCoffeeMachineUseCase->execute();

        return new Response('', Response::HTTP_OK);
    }

    /**
     * @throws Exception
     */
    #[Route('/coffee-machine/stop', name: 'app_coffee_machine_stop', methods: ['POST'])]
    public function stopCoffeeMachine(
        CoffeeMachineRepository $coffeeMachineRepository,
    ): Response {
        $coffeeMachineEntity = $coffeeMachineRepository->get();
        $coffeeMachineModel = $this->coffeeMachineMapper->toCoffeeMachineModel($coffeeMachineEntity);
        $startCoffeeMachineUseCase = new StopCoffeeMachineUseCase($coffeeMachineRepository, $coffeeMachineModel, $coffeeMachineEntity);
        $startCoffeeMachineUseCase->execute();

        return new Response('', Response::HTTP_OK);
    }

    /**
     * @throws Exception
     */
    #[Route('/coffee-machine/reset', name: 'app_coffee_machine_reset', methods: ['POST'])]
    public function resetCoffeeMachine(
        CoffeeMachineRepository $coffeeMachineRepository,
    ): Response {
        $coffeeMachineEntity = $coffeeMachineRepository->get();
        $coffeeMachineModel = $this->coffeeMachineMapper->toCoffeeMachineModel($coffeeMachineEntity);
        $startCoffeeMachineUseCase = new ResetCoffeeMachineUseCase($coffeeMachineRepository, $coffeeMachineModel, $coffeeMachineEntity);
        $startCoffeeMachineUseCase->execute();

        return new Response('', Response::HTTP_OK);
    }
}
