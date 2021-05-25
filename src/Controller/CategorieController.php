<?php

namespace App\Controller;

use App\Entity\Categorie;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CategorieController extends AbstractController
{
    /**
 * @Route("/categorie", name="categorie")
 * 
 */
    
    public function categorie()
    {
        $repo =$this->getDoctrine()->getRepository(Categorie::class);
        $categories= $repo->findAll();
        return $this->render('categorie/index.html.twig', [
            'categories' => $categories,
        ]);
    }
}
