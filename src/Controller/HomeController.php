<?php
namespace App\Controller;

use App\Entity\Task;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController {

/**
 * @Route("/", name="homepage")
 * 
 */
public function home(){

$repo =$this->getDoctrine()->getRepository(Task::class);
$tasks = $repo->findBy([],['id' => 'desc'], 3);
var_dump($tasks);
    $name = 'willice';
    $txt = 'Lorem ipsum dolor sit amet.'; 
    return $this->render(
        'home2.html.twig',
        [
            'tasks'=> $tasks,
            'name' => $name,
        'txt' => $txt
        ]
    
    );
}
}






?>