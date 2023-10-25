<?php

namespace App\Controller;

use App\Entity\NoteList;
use App\Form\NoteListType;
use App\Repository\NoteListRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/note/list')]
class NoteListController extends AbstractController
{
    #[Route('/', name: 'app_note_list_index', methods: ['GET'])]
    public function index(NoteListRepository $noteListRepository): Response
    {
        return $this->render('note_list/index.html.twig', [
            'note_lists' => $noteListRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_note_list_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $noteList = new NoteList();
        $form = $this->createForm(NoteListType::class, $noteList);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($noteList);
            $entityManager->flush();

            return $this->redirectToRoute('app_note_list_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('note_list/new.html.twig', [
            'note_list' => $noteList,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_note_list_show', methods: ['GET'])]
    public function show(NoteList $noteList): Response
    {
        return $this->render('note_list/show.html.twig', [
            'note_list' => $noteList,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_note_list_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, NoteList $noteList, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(NoteListType::class, $noteList);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_note_list_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('note_list/edit.html.twig', [
            'note_list' => $noteList,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_note_list_delete', methods: ['POST'])]
    public function delete(Request $request, NoteList $noteList, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$noteList->getId(), $request->request->get('_token'))) {
            $entityManager->remove($noteList);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_note_list_index', [], Response::HTTP_SEE_OTHER);
    }
}
