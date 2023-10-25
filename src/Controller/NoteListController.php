<?php

namespace App\Controller;

use App\Entity\NoteList;
use App\Entity\Task;
use App\Form\NoteListType;
use App\Form\TaskType;
use App\Repository\NoteListRepository;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\DependencyInjection\Attribute\Autowire;

#[Route('/list')]
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
    public function new(Request $request, EntityManagerInterface $entityManager, #[Autowire('%list_img_dir%')] string $listImgDir): Response
    {
        $user = $this->getUser();

        if ($user) {
            $noteList = new NoteList();
            $form = $this->createForm(NoteListType::class, $noteList);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                // Upload a file
                $img = $form['img_url']->getData();
                
                if ($img) {
                    $filename = bin2hex(random_bytes(6)).'.'.$img->guessExtension();
                    $img->move($listImgDir, $filename);
                    $noteList->setImgUrl($filename);
                }
                // -------

                $noteList->setUser($user);
                $noteList->setCreatedAt(new DateTimeImmutable());
    
                $entityManager->persist($noteList);
                $entityManager->flush();
    
                return $this->redirectToRoute('app_note_list_index', [], Response::HTTP_SEE_OTHER);
            }
    
            return $this->render('note_list/new.html.twig', [
                'note_list' => $noteList,
                'form' => $form,
            ]);

        } else $this->redirectToRoute('app_home', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/{id}', name: 'app_note_list_show', methods: ['GET', 'POST'])]
    public function show(Int $id, NoteList $noteList, Request $request, EntityManagerInterface $entityManager, NoteListRepository $noteListRepository): Response
    {
        $task = new Task();
        $form = $this->createForm(TaskType::class, $task);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $task->setList($noteListRepository->find($id));
            $task->setCreatedAt(new DateTimeImmutable());

            $entityManager->persist($task);
            $entityManager->flush();

            return $this->redirectToRoute('app_note_list_show', ['id' => $id], Response::HTTP_SEE_OTHER);
        }

        return $this->render('note_list/show.html.twig', [
            'note_list' => $noteList,
            'form_task' => $form
        ]);
    }

    #[Route('/{id}/edit', name: 'app_note_list_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, NoteList $noteList, EntityManagerInterface $entityManager, #[Autowire('%list_img_dir%')] string $listImgDir): Response
    {
        $user = $this->getUser();

        if ($user) {
            $form = $this->createForm(NoteListType::class, $noteList);
            $form->handleRequest($request);
    
            if ($form->isSubmitted() && $form->isValid()) {
                $img = $form['img_url']->getData();
                
                if ($img) {
                    $filename = bin2hex(random_bytes(6)).'.'.$img->guessExtension();
                    $img->move($listImgDir, $filename);
                    $noteList->setImgUrl($filename);
                }

                $entityManager->flush();
    
                return $this->redirectToRoute('app_note_list_index', [], Response::HTTP_SEE_OTHER);
            }
    
            return $this->render('note_list/edit.html.twig', [
                'note_list' => $noteList,
                'form' => $form,
            ]);

        } else $this->redirectToRoute('app_home', [], Response::HTTP_SEE_OTHER);
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
