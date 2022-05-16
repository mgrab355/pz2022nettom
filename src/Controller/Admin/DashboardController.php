<?php

namespace App\Controller\Admin;

use App\Entity\RaportTest;
use App\Entity\User;
use App\Entity\Projects;
use App\Entity\ProjectRaports;
use App\Entity\UsersProject;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
//#[IsGranted('ROLE_ADMIN')]
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return $this->redirect('http://localhost:6969/admin?crudAction=index&crudControllerFqcn=App%5CController%5CAdmin%5CRaportTestCrudController&menuIndex=1&submenuIndex=-1');
    }


    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            // the name visible to end users
            ->setTitle('pz2022nettom');

    }

    public function configureMenuItems(): iterable
    {

            yield MenuItem::linkToCrud('raport_test', 'fa fa-tags', RaportTest::class);
            yield MenuItem::linkToCrud('user', 'fa fa-tags', User::class);
            yield MenuItem::linkToCrud('projects', 'fa fa-tags', Projects::class);
            yield MenuItem::linkToCrud('Users Projects', 'fa fa-tags', UsersProject::class);
            yield MenuItem::linkToCrud('Projects Raports', 'fa fa-tags', ProjectRaports::class);



    }
}
