<?php

namespace App\Controller\Admin;

use App\Entity\Table;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class TableCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Table::class;
    }


    public function configureFields(string $pageName): iterable
    {
       yield TextField::new("type");
       yield TextField::new("position");
       yield TextField::new("type");
       yield TextField::new("description");
       yield IntegerField::new("chairsNumber");
       yield IntegerField::new("minimalConsummation");
        yield ImageField::new('thumbnailName')
            ->setBasePath('uploads/thumbnails/table')
            ->setUploadDir('public/uploads/thumbnails/table');
        yield AssociationField::new("restaurant");

    }
}
