<?php

namespace App\Controller;

use App\Entity\Developer;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DeveloperController extends AbstractController
{
    /**
     * @Route("/developer", name="developer")
     */
    public function workers(){

        $repo =$this->getDoctrine()->getRepository(Developer::class);
        $devs = $repo->findAll();
        
         
            return $this->render(
                'developer/index.html.twig',
                [
                    'tasks'=> $devs,
                    
                
                ]
            
            );
        }
}
