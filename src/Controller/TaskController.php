<?php

namespace App\Controller;

use App\Entity\Task;
use App\Form\TaskType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TaskController extends AbstractController
{
    /**
     * @Route("/task", name="task")
     */
    public function index(): Response
    {
        return $this->render('task/index.html.twig', [
            'controller_name' => 'TaskController',
        ]);
    }

    /**
     * @Route("/create", name="createtask")
     */
    public function createTask(){
 $task = new Task;

 $form = $this->createForm(TaskType::class, $task);
        return $this->render('new.html.twig', [
            
            'form' => $form->createView(),
]);



    }
}
