<?php

namespace App\Controller;

use App\Entity\Horaire;
use App\Form\HoraireType;
use App\Repository\HoraireRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/horaire')]
class HoraireController extends AbstractController
{
    #[Route('/', name: 'app_horaire_index', methods: ['GET'])]
    public function index(HoraireRepository $horaireRepository): Response
    {
        return $this->render('horaire/index.html.twig', [
            'horaires' => $horaireRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_horaire_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $horaire = new Horaire();
        $form = $this->createForm(HoraireType::class, $horaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $horaire->setUserCreate($this->getUser());
            $horaire->setDateCreate(new \DateTime('now'));
            $entityManager->persist($horaire);
            $entityManager->flush();

            return $this->redirectToRoute('app_horaire_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('horaire/new.html.twig', [
            'horaire' => $horaire,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_horaire_show', methods: ['GET'])]
    public function show(Horaire $horaire): Response
    {
        return $this->render('horaire/show.html.twig', [
            'horaire' => $horaire,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_horaire_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Horaire $horaire, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(HoraireType::class, $horaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $horaire->setUserUpdate($this->getUser());
            $horaire->setDateUpdate(new \DateTime('now'));
            $entityManager->flush();

            return $this->redirectToRoute('app_horaire_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('horaire/edit.html.twig', [
            'horaire' => $horaire,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_horaire_delete', methods: ['POST'])]
    public function delete(Request $request, Horaire $horaire, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$horaire->getId(), $request->getPayload()->getString('_token'))) {
            $horaire->setUserDelete($this->getUser());
            $horaire->setDateDelete(new \DateTime('now'));
            $entityManager->remove($horaire);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_horaire_index', [], Response::HTTP_SEE_OTHER);
    }
}
