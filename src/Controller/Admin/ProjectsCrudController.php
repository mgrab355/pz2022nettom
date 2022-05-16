<?php

namespace App\Controller\Admin;

use App\Entity\Projects;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;

class ProjectsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Projects::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('name'),
            TextEditorField::new('url' ),
            DateField::new('date'),
        ];
    }

}
