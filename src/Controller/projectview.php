<?php

namespace App\Controller;

use App\Entity\Project;

use phpDocumentor\Reflection\Types\AbstractList;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;
use App\Services\runScan;




class projectview extends AbstractController
{
    /**
     * @Route ("/project/id/{id}",name="project" )
     *
     *
     *
     */

    public function index(Request $request,runScan $runScan,ManagerRegistry $doctrine,$id): Response
    {

//     dump($question_id = $request->query->get('$id'));
        $entityManager = $doctrine->getManager();
//        $id=$this->getRequest()->getUriForPath('project');
//        dump($runScan->runScan($id,$doctrine));
        $scan = new Project();
        $form = $this->createFormBuilder($scan)
            ->add('doTest', SubmitType::class)
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())  {

            $runScan->runScan($id,$doctrine);


        }

//        scan($request,$runScan,$doctrine,$id);
//        $runScan->runScan($id,$doctrine);

        return $this->render('front/project.html.twig', array(
            'form' => $form->createView()));

    }

}