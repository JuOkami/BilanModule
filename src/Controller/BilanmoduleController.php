<?php

namespace App\Controller;

use App\Entity\Bilanmodule;
use App\Form\BilanmoduleType;
use App\Repository\BilanmoduleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/bilanmodule')]
class BilanmoduleController extends AbstractController
{
    #[Route('/', name: 'app_bilanmodule_index', methods: ['GET'])]
    public function index(BilanmoduleRepository $bilanmoduleRepository): Response
    {
        return $this->render('bilanmodule/index.html.twig', [
            'bilanmodules' => $bilanmoduleRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_bilanmodule_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $bilanmodule = new Bilanmodule();
        $form = $this->createForm(BilanmoduleType::class, $bilanmodule);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($bilanmodule);
            $entityManager->flush();

            return $this->redirectToRoute('app_bilanmodule_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bilanmodule/new.html.twig', [
            'bilanmodule' => $bilanmodule,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_bilanmodule_show', methods: ['GET'])]
    public function show(Bilanmodule $bilanmodule): Response
    {
        return $this->render('bilanmodule/show.html.twig', [
            'bilanmodule' => $bilanmodule,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_bilanmodule_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Bilanmodule $bilanmodule, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(BilanmoduleType::class, $bilanmodule);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_bilanmodule_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bilanmodule/edit.html.twig', [
            'bilanmodule' => $bilanmodule,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_bilanmodule_delete', methods: ['POST'])]
    public function delete(Request $request, Bilanmodule $bilanmodule, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$bilanmodule->getId(), $request->request->get('_token'))) {
            $entityManager->remove($bilanmodule);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_bilanmodule_index', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/editnote/{id}/{note}', name: 'app_bilanmodule_editnote', methods: ['get'])]
    public function editNote(
        Bilanmodule $bilanmodule,
        int $note,
        EntityManagerInterface $entityManager
    )
    : Response
    {
        $bilanmodule->setNote($note);
        $entityManager->persist($bilanmodule);
        $entityManager->flush();


        return $this->redirectToRoute('app_bilanmodule_index', [], Response::HTTP_SEE_OTHER);
    }

}
