<?php

declare(strict_types=1);

namespace App\Controller;

use App\Contracts\DoSomethingInterface;
use App\DTO\HappinessDTO;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DoSomethingController extends AbstractController
{
    #[Route('/happiness/{value}', requirements: ['value' => '[0-9]+'], methods: [Request::METHOD_GET])]
    public function index(int $value, DoSomethingInterface $service): JsonResponse
    {
        return new JsonResponse([
            'status' => $service->makeMeHappy(HappinessDTO::create($value)),
        ]);
    }
}
