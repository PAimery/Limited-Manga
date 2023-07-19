<?php

namespace App\Controller;

use App\Entity\Universe;
use App\Form\UniverseType;
use App\Repository\UniverseRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/univers', name: 'admin_universe_')]
class AdminUniverseController extends AbstractController
{
    #[Route('/', name: 'index', methods: ['GET'])]
    public function index(UniverseRepository $universeRepository): Response
    {
        return $this->render('admin_universe/index.html.twig', [
            'universes' => $universeRepository->findBy([], ['title' => 'ASC']),
        ]);
    }

    #[Route('/ajouter', name: 'new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $universe = new Universe();
        $form = $this->createForm(UniverseType::class, $universe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($universe);
            $entityManager->flush();

            return $this->redirectToRoute('admin_universe_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin_universe/new.html.twig', [
            'universe' => $universe,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'show', methods: ['GET'])]
    public function show(Universe $universe): Response
    {
        return $this->render('admin_universe/show.html.twig', [
            'universe' => $universe,
        ]);
    }

    #[Route('/{id}/éditer', name: 'edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Universe $universe, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(UniverseType::class, $universe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('admin_universe_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin_universe/edit.html.twig', [
            'universe' => $universe,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'delete', methods: ['POST'])]
    public function delete(Request $request, Universe $universe, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $universe->getId(), $request->request->get('_token'))) {
            $entityManager->remove($universe);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_universe_index', [], Response::HTTP_SEE_OTHER);
    }
}
