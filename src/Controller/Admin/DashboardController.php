<?php

namespace App\Controller\Admin;
use App\Entity\Table;
use App\Entity\Restaurant;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
//        return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
         $adminUrlGenerator = $this->container->get( \EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator::class);
         return $this->redirect($adminUrlGenerator->setController(RestaurantCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Licenta');
    }

    public function configureMenuItems(): iterable
    {
        $adminUrlGenerator = $this->container->get( \EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator::class);
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linktoRoute('Back to the website', 'fas fa-home', 'app_home_page');
//        todo: use linkToEntity
        yield MenuItem::linkToUrl('Tables', 'fas fa-list', $adminUrlGenerator->setController(\App\Controller\Admin\TableCrudController::class)->generateUrl());
        yield MenuItem::linkToUrl('Restaurants', 'fas fa-comments', $adminUrlGenerator->setController(RestaurantCrudController::class)->generateUrl());
    }
}
