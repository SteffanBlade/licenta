<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;
use \App\Repository\RestaurantRepository;

class RestaurantsController extends AbstractController
{
    #[Route('/restaurants', name: 'app_restaurants')]
    public function index(Environment $twig, RestaurantRepository $restaurantRepository): Response
    {

        if(empty($this->getUser())){
            return $this->redirectToRoute("app_login");
        }

        return $this->render('restaurants/index.html.twig', [
            'controller_name' => 'RestaurantsController',
            'restaurants' => $restaurantRepository->findAll()
        ]);
    }
}
