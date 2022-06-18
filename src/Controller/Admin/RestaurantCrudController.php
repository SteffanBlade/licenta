<?php

namespace App\Controller\Admin;

use App\Entity\Restaurant;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TimeField;

class RestaurantCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Restaurant::class;
    }


    public function configureFields(string $pageName): iterable
    {
        yield TextField::new("name");
        yield TextField::new("description");
        yield TextField::new("phone");
        yield TextField::new("email");
        yield TextField::new("location");
        yield TimeField::new("openHour");
        yield TimeField::new("closingHour");
     yield ImageField::new('thumbnailName')
         ->setBasePath('uploads/thumbnails/restaurant')
         ->setUploadDir('public/uploads/thumbnails/restaurant');
    }

}
