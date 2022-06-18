<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class CustomerController extends AbstractController
{
    #[Route('/customer', name: 'app_customer')]
    public function index(): Response
    {
        if(empty($this->getUser())){
            return $this->redirectToRoute("app_login");
        }

        return $this->render('customer/index.html.twig', [
            'controller_name' => 'CustomerController',
        ]);
    }


}
