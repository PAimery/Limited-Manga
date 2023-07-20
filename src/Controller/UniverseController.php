<?php

namespace App\Controller;

use App\Entity\Collector;
use App\Entity\Universe;
use App\Repository\CollectorRepository;
use App\Repository\UniverseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


#[Route('/univers', name: 'universe_')]
class UniverseController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(UniverseRepository $universeRepository): Response
    {
        $universes = $universeRepository->findAll();
        return $this->render('universe/index.html.twig', [
            'universes' => $universes,
        ]);
    }

    #[Route('/{id}/collectors', name: 'show', methods: ['GET'])]
    public function show(Universe $universe): Response
    {
        $universe->getCollectors();

        return $this->render('universe/show.html.twig', [
            'universe' => $universe,
        ]);
    }
}
