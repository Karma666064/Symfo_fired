<?php

namespace App\Controller;

use App\Entity\Task;
use App\Form\TaskType;
use App\Repository\NoteListRepository;
use App\Repository\TaskRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use DateTimeImmutable;

// #[Route('/task')]
class TaskController extends AbstractController
{
    // #[Route('/new_task/{id_list}', name: 'app_new_task', methods: ['GET'])]
    // public function index(Int $id_list, Request $request, EntityManagerInterface $entityManager, NoteListRepository $noteListRepository): Response
    // {
    //     $task = new Task();
    //     $form = $this->createForm(TaskType::class, $task);
    //     $form->handleRequest($request);

    //     if ($form->isSubmitted() && $form->isValid()) {
    //         $task->setList($noteListRepository->find($id_list));
    //         $task->setCreatedAt(new DateTimeImmutable());

    //         $entityManager->persist($task);
    //         $entityManager->flush();

    //         return $this->redirectToRoute('app_note_list_show', ['id' => $id_list], Response::HTTP_SEE_OTHER);
    //     }
    // }
    
    // #[Route('/', name: 'app_task_index', methods: ['GET'])]
    // public function index(TaskRepository $taskRepository): Response
    // {
    //     return $this->render('task/index.html.twig', [
    //         'tasks' => $taskRepository->findAll(),
    //     ]);
    // }

    // #[Route('/new', name: 'app_task_new', methods: ['GET', 'POST'])]
    // public function new(Request $request, EntityManagerInterface $entityManager): Response
    // {
    //     $task = new Task();
    //     $form = $this->createForm(TaskType::class, $task);
    //     $form->handleRequest($request);

    //     if ($form->isSubmitted() && $form->isValid()) {
    //         $entityManager->persist($task);
    //         $entityManager->flush();

    //         return $this->redirectToRoute('app_task_index', [], Response::HTTP_SEE_OTHER);
    //     }

    //     return $this->render('task/new.html.twig', [
    //         'task' => $task,
    //         'form' => $form,
    //     ]);
    // }

    // #[Route('/{id}', name: 'app_task_show', methods: ['GET'])]
    // public function show(Task $task): Response
    // {
    //     return $this->render('task/show.html.twig', [
    //         'task' => $task,
    //     ]);
    // }

    // #[Route('/{id}/edit', name: 'app_task_edit', methods: ['GET', 'POST'])]
    // public function edit(Request $request, Task $task, EntityManagerInterface $entityManager): Response
    // {
    //     $form = $this->createForm(TaskType::class, $task);
    //     $form->handleRequest($request);

    //     if ($form->isSubmitted() && $form->isValid()) {
    //         $entityManager->flush();

    //         return $this->redirectToRoute('app_task_index', [], Response::HTTP_SEE_OTHER);
    //     }

    //     return $this->render('task/edit.html.twig', [
    //         'task' => $task,
    //         'form' => $form,
    //     ]);
    // }

    // #[Route('/{id}', name: 'app_task_delete', methods: ['POST'])]
    // public function delete(Request $request, Task $task, EntityManagerInterface $entityManager): Response
    // {
    //     if ($this->isCsrfTokenValid('delete'.$task->getId(), $request->request->get('_token'))) {
    //         $entityManager->remove($task);
    //         $entityManager->flush();
    //     }

    //     return $this->redirectToRoute('app_task_index', [], Response::HTTP_SEE_OTHER);
    // }
}
