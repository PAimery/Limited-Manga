<?php

namespace App\Controller;

use App\Entity\Collector;
use App\Entity\Universe;
use App\Repository\CollectorRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/collector', name: 'collector_')]
class CollectorController extends AbstractController
{
    #[Route('/{id}', name: 'show', methods: ['GET'])]
    public function show(Collector $collector): Response
    {
        return $this->render('collector/show.html.twig', [
            'collector' => $collector,
        ]);
    }
}
