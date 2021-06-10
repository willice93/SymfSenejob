<?php

namespace App\Controller;

use App\Entity\Client;
use App\Form\ClientType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ClientController extends AbstractController
{
    /**
     * @Route("/client", name="client")
     */
    public function index(): Response
    {
        return $this->render('client/index.html.twig', [
            'controller_name' => 'ClientController',
        ]);
    }

    /**
     * @Route("/createclient", name="newclient")
     */
    public function newClientk(){
        $client = new Client;
       
        $form = $this->createForm(ClientType::class, $client);
               return $this->render('client/new2.html.twig', [
                   
                   'clientForm' => $form->createView(),
       ]);
}
}