<?php

namespace App\Controller;

use App\Entity\Nationalite;
use App\Form\NationaliteType;
use App\Repository\NationaliteRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/nationalite')]
class NationaliteController extends AbstractController
{
    #[Route('/', name: 'app_nationalite_index', methods: ['GET'])]
    public function index(NationaliteRepository $nationaliteRepository): Response
    {
        return $this->render('nationalite/index.html.twig', [
            'nationalites' => $nationaliteRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_nationalite_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $nationalite = new Nationalite();
        $form = $this->createForm(NationaliteType::class, $nationalite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $nationalite->setUserCreate($this->getUser());
            $nationalite->setDateCreate(new \DateTime('now'));
            $entityManager->persist($nationalite);
            $entityManager->flush();

            return $this->redirectToRoute('app_nationalite_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('nationalite/new.html.twig', [
            'nationalite' => $nationalite,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_nationalite_show', methods: ['GET'])]
    public function show(Nationalite $nationalite): Response
    {
        return $this->render('nationalite/show.html.twig', [
            'nationalite' => $nationalite,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_nationalite_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Nationalite $nationalite, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(NationaliteType::class, $nationalite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $nationalite->setUserUpdate($this->getUser());
            $nationalite->setDateUpdate(new \DateTime('now'));
            $entityManager->flush();

            return $this->redirectToRoute('app_nationalite_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('nationalite/edit.html.twig', [
            'nationalite' => $nationalite,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_nationalite_delete', methods: ['POST'])]
    public function delete(Request $request, Nationalite $nationalite, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$nationalite->getId(), $request->getPayload()->getString('_token'))) {
            $nationalite->setUserDelete($this->getUser());
            $nationalite->setDateDelete(new \DateTime('now'));
            $entityManager->remove($nationalite);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_nationalite_index', [], Response::HTTP_SEE_OTHER);
    }
}
