<?php
// src/Controller/ProgramController.php
namespace App\Controller;

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
}
