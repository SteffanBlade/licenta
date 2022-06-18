<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TablesController extends AbstractController
{
    #[Route('/tables', name: 'app_tables')]
    public function index(\App\Repository\TableRepository $tableRepository): Response
    {
        if(empty($this->getUser())){
            return $this->redirectToRoute("app_login");
        }

        return $this->render('tables/index.html.twig', [
            'controller_name' => 'TablesController',
            'tables' => $tableRepository->findAll()
        ]);
    }
}
