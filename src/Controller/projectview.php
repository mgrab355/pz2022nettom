<?php

namespace App\Controller;

use App\Entity\PageAlert;
use App\Entity\Project;

use App\Entity\ScanAlert;
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
        $data=$doctrine->getRepository(ScanAlert::class)->findAll();
//        foreach ($data as $zm) {
//            $dataEntity = new PageAlert();
//            dump($zm->getName(),$zm->getParam(),$zm->getRisk());
//        }

        $scan = new Project();
        $form = $this->createFormBuilder($scan)
            ->add('doTest', SubmitType::class)
            ->getForm();
        $viewdata= new PageAlert();
//        $form1 = $this->createFormBuilder($viewdata)
//            ->add(;)
//            ->getForm();
//        $form = $this->createForm(new PageAlert(), $data);
//        $form->get('alert')->setData($data);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())  {
            $runScan->runScan($id,$doctrine);
            $entityManager = $doctrine->getManager();
            $entityManager->persist($id);
            $entityManager->flush();
//            return $this->redirectToRoute('project', ['id' => $id->getId()]);
            return $this->redirect($this->generateUrl('project', array('id' => $id->getId(),)));
            $request=null;
        }

//        $data=$doctrine->getRepository(PageAlert::class)->findAll();
//        dump($data);
//        foreach ($data as $zm) {
//            $dataEntity = new PageAlert();
//
//            $dataEntity->getRisk();
//            dump($zm->getRisk());
//        }
//
//        $this->em->flush();

//        scan($request,$runScan,$doctrine,$id);
//        $runScan->runScan($id,$doctrine);

        return $this->render('front/project.html.twig',[
            'form' => $form->createView(),
            'alert'=>$data]);

    }

}