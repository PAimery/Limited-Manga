<?php
// src/Controller/ProgramController.php
namespace App\Controller;

use App\Repository\CollectorRepository;
use App\Repository\UniverseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/', name: 'home_')]
class HomeController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(UniverseRepository $universeRepository, CollectorRepository $collectorRepository): Response
    {
        $universes = $universeRepository->findBy([], ['id' => 'DESC'], 5);

        $collectors = $collectorRepository->findBy([], ['id' => 'DESC'], 3);

        return $this->render('home/index.html.twig', [
            'universes' => $universes,
            'collectors' => $collectors,

        ]);
    }
}
