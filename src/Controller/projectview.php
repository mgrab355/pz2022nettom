<?php

namespace App\Controller;

use App\Entity\Project;
use phpDocumentor\Reflection\Types\AbstractList;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Services\insertScan;


class projectview extends AbstractController
{
    /**
     * @Route ("/project")
     *
     * */
    public function index(insertScan $insertScan){
        $project = new Project();
        $form = $this->createFormBuilder($project)
            ->add('doTest', SubmitType::class)
            ->getForm();
        return $this->render('front/project.html.twig', array(
            'form' => $form->createView()));
    }
}