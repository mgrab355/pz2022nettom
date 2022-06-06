<?php

namespace App\Controller\Admin;

use App\Entity\ProjectRaports;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ProjectRaportsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ProjectRaports::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
