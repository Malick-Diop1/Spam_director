<?php

namespace App\Controller;

use App\Entity\ModeReglement;
use App\Form\ModeReglementType;
use App\Repository\ModeReglementRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/mode/reglement')]
class ModeReglementController extends AbstractController
{
    #[Route('/', name: 'app_mode_reglement_index', methods: ['GET'])]
    public function index(ModeReglementRepository $modeReglementRepository): Response
    {
        return $this->render('mode_reglement/index.html.twig', [
            'mode_reglements' => $modeReglementRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_mode_reglement_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $modeReglement = new ModeReglement();
        $form = $this->createForm(ModeReglementType::class, $modeReglement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($modeReglement);
            $entityManager->flush();

            return $this->redirectToRoute('app_mode_reglement_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('mode_reglement/new.html.twig', [
            'mode_reglement' => $modeReglement,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_mode_reglement_show', methods: ['GET'])]
    public function show(ModeReglement $modeReglement): Response
    {
        return $this->render('mode_reglement/show.html.twig', [
            'mode_reglement' => $modeReglement,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_mode_reglement_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ModeReglement $modeReglement, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ModeReglementType::class, $modeReglement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_mode_reglement_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('mode_reglement/edit.html.twig', [
            'mode_reglement' => $modeReglement,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_mode_reglement_delete', methods: ['POST'])]
    public function delete(Request $request, ModeReglement $modeReglement, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$modeReglement->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($modeReglement);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_mode_reglement_index', [], Response::HTTP_SEE_OTHER);
    }
}
