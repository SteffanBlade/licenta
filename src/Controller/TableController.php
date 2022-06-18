<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TableController extends AbstractController
{
    #[Route('/table', name: 'app_table')]
    public function index(): Response
    {

        if(empty($this->getUser())){
            return $this->redirectToRoute("app_login");
        }

        return $this->render('table/index.html.twig', [
            'controller_name' => 'TableController',
        ]);
    }
}
