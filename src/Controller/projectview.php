<?php

namespace App\Controller;

use App\Entity\PageAlert;
use App\Entity\Project;

use App\Entity\ScanAlert;
use App\Entity\ScansId;
use App\Services\AdvancedScan;
use App\Services\InsertingScan;
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
//    private function compare(Customer $a, Customer $b)TO DOOO
//    {
//        return $a->getTitle() === $b->getTitle() &&
//            $a->getName() === $b->getName() &&
//            $a->getLastName() === $b->getLastName();
//    }
    /**
     * @Route ("/project/id/{id}",name="project" )
     *
     *
     *
     */

    public function index(Request $request,runScan $runScan,ManagerRegistry $doctrine,$id,InsertingScan $insertingscan,AdvancedScan $getAdvancedScan): Response
    {
        $scanid=0;
//     dump($question_id = $request->query->get('$id'));
        $entityManager = $doctrine->getManager();
//        $id=$this->getRequest()->getUriForPath('project');
//        dump($runScan->runScan($id,$doctrine));
        $ProjectData=$doctrine->getRepository(Project::class)->findOneBy(['id'=> $id]);
        $scanid = $doctrine->getRepository(ScansId::class)->findOneBy(['projectId'=>$id],['id'=>'DESC']);



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
            $scans=new ScansId();
            $scans->setProjectId($id);
            $entityManager = $doctrine->getManager();
            $entityManager->persist($scans);
            $entityManager->flush();
            $scanid = $doctrine->getRepository(ScansId::class)->findOneBy(['projectId'=>$id],['id'=>'DESC']);
            $insertingscan->InsertingScan($doctrine,$getAdvancedScan,$scanid,$id,$ProjectData->getUrl());
//            $entityManager = $doctrine->getManager();
//            $entityManager->persist($id);
//            $entityManager->flush();
////            return $this->redirectToRoute('project', ['id' => $id->getId()]);
//            return $this->redirect($this->generateUrl('project', array('id' => $id->getId(),)));
            $request=null;
        }
//        $ScanAlertData=$doctrine->getRepository(ScanAlert::class)->findAll();

        $ScanAlertData=$doctrine->getRepository(ScanAlert::class)->findBy(['scans'=>$scanid],['scans'=>'DESC']);


        return $this->render('front/project.html.twig',[
            'form' => $form->createView(),
            'alert'=>$ScanAlertData,
            'project'=>$ProjectData
        ]);//Szczególowe scany


    }

}