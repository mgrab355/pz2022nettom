<?php

namespace App\Controller;

use App\Entity\Project;
use App\Repository\ProjectRepository;
use App\Services\lastRow;
use App\Services\runScan;
use phpDocumentor\Reflection\Types\AbstractList;
use Symfony\Bridge\Doctrine\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Services\insertScan;



class projectview extends AbstractController
{
    /**
     * @Route ("/project/{id}" name="project")
     *
     * */
    public function index(insertScan $insertScan, ManagerRegistry $doctrine, runScan $runScan, Project $project, lastRow $lastRow)
    {
        $scan = new Project();
        $form = $this->createFormBuilder($scan)
            ->add('doTest', SubmitType::class)
            ->getForm();
        return $this->render('front/project.html.twig', array(
            'form' => $form->createView()));
    }
}