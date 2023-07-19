<?php

namespace App\Controller;

use App\Entity\Collector;
use App\Form\CollectorType;
use App\Repository\CollectorRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/collectors', name: 'admin_collector_')]
class AdminCollectorController extends AbstractController
{
    #[Route('/', name: 'index', methods: ['GET'])]
    public function index(CollectorRepository $collectorRepository): Response
    {
        return $this->render('collector/index.html.twig', [
            'collectors' => $collectorRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $collector = new Collector();
        $form = $this->createForm(CollectorType::class, $collector);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($collector);
            $entityManager->flush();

            return $this->redirectToRoute('admin_collector_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('collector/new.html.twig', [
            'collector' => $collector,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'show', methods: ['GET'])]
    public function show(Collector $collector): Response
    {
        return $this->render('admin_collector/show.html.twig', [
            'collector' => $collector,
        ]);
    }

    #[Route('/{id}/edit', name: 'edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Collector $collector, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CollectorType::class, $collector);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_collector_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin_collector/edit.html.twig', [
            'collector' => $collector,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'delete', methods: ['POST'])]
    public function delete(Request $request, Collector $collector, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $collector->getId(), $request->request->get('_token'))) {
            $entityManager->remove($collector);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_collector_index', [], Response::HTTP_SEE_OTHER);
    }
}
