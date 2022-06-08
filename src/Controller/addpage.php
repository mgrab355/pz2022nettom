<?php

namespace App\Controller;

use ApiPlatform\Core\OpenApi\Model\Response;
use App\Entity\ScansId;
use App\Services\insertScan;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use \Symfony\Component\Form\Extension\Core\Type\TextType;
use App\Entity\Project;
use Doctrine\Persistence\ManagerRegistry;
use \Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Services\GetScan;
use App\Services\runScan;
use App\Entity\ScanAlert;
use App\Services\AdvancedScan;
use App\Entity\User;

use Symfony\Component\HttpFoundation\RequestStack;

class addpage extends AbstractController
{
    /**
     * @Route ("/addpage",name="addpage")
     *
     * */
    public function index(ManagerRegistry $doctrine, Request $request)
    {
        $project = new Project();
        $form = $this->createFormBuilder($project)
            ->add('Name', TextType::class)
            ->add('url', TextType::class)
            ->add('users', TextType::class)
            ->add('url_image', TextType::class)
            ->getForm();



        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $entityManager = $doctrine->getManager();
            $entityManager->persist($data);
            $entityManager->flush();
            $id = $doctrine->getRepository(Project::class)->findOneby(array(),array('id'=>'DESC'),1,0);
//            return $this->redirectToRoute('project', ['id' => $id->getId()]);
            return $this->redirect($this->generateUrl('project', array('id' => $id->getId(),)));
        }

        return $this->render('/front/addeditpage.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * @Route ("/jsonScan")
     */
    public function showScans(ManagerRegistry $doctrine, AdvancedScan $getAdvancedScan,$scansid=1,$projectID=5)
    {
        // wczesniejszy import z services/getscan oraz wywowalnie funkcji.
        //23.05  wyswietlenie szczegolowego scanu
//        $zm= (new ScansId { scans = $id, project = "5"});
//        $zm["id"]=1;
//        $zm1= new Project();
//        $zm1["id"]=5;
        $ProjectScans=$doctrine->getRepository(ScansId::class)->findOneBy(['id'=> $scansid]);
        $ProjectData=$doctrine->getRepository(Project::class)->findOneBy(['id'=> $projectID]);
        $scans = $getAdvancedScan->getAdvScans('http://127.0.0.1:7000',$doctrine);
        $scan = json_decode($scans, true);
        $entityManager = $doctrine->getManager();
//        dump($ProjectScans);
        foreach ($scan as $key => $values) { //dane w pliku sa oznaczone jako low medium high petla przechodzi przechodzi po kazdym z nich
            foreach ($values as $item => $value) { // przechodzi po kazdych danych z low/medium/high i wyciaga dane od razu zapisujac do bazy
                $alert = new ScanAlert();
                $alert->setEvidence($value['evidence']);
                $alert->setName($value['name']);
                $alert->setParam($value['param']);
                $alert->setRisk($value['risk']);
                $alert->setDescription($value['description']);
                $alert->setConfidence($value['confidence']);
                $alert->setSolution($value['solution']);
                $alert->setMethod($value['method']);
                $alert->setSourceid($value['sourceid']);
                $alert->setPluginID($value['pluginId']);
                $alert->setCweid($value['cweid']);
                $alert->setWascid($value['wascid']);
                $alert->setMessegeId($value['messageId']);
                $alert->setUrl($value['url']);
                $alert->setAlertRef($value['alertRef']);
                $alert->setReference($value['reference']);
                $alert->setScans($ProjectScans);
                $alert->setProject($ProjectData);
                $entityManager->persist($alert);
                $entityManager->flush();
            }
        }
//        return true; //  nic sie nie dzieje, jest wyswietlana tylko jeden raport niezaleznie od tego co zostanie podane, nie dodaje do bazy
        dump($doctrine->getRepository(ScanAlert::class)->findAll());
        return $this->render('front/login.html.twig');
    }

    /**
     * @Route("/users")
     */
    public function showUsers(ManagerRegistry $doctrine, int $id = 1): Response

    {
        $data = $doctrine->getRepository(User::class)->find($id);

        if (!$data) {
            throw $this->createNotFoundException(
                'No product found for id '
            );
        }
        return dump($data->getEmail());

    }
}

