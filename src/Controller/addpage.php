<?php

namespace App\Controller;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use \Symfony\Component\Form\Extension\Core\Type\TextType;
use App\Entity\Project;
use Doctrine\Persistence\ManagerRegistry;
use \Symfony\Component\HttpFoundation\Request;
use \Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Services\ApiKey;
use App\Entity\ScanAlert;
use App\Services\GetScan;
class addpage extends AbstractController
{
    /**
     * @Route ("/addpage" name='add_page')
     *
     * */

    public function index(ManagerRegistry $doctrine, Request $request, ApiKey $apikey)
    {
        $project = new Project();
        $form = $this->createFormBuilder($project)
            ->add('Name', TextType::class)
            ->add('url', TextType::class)
            ->add('users', TextType::class)
//            ->add('icon', TextType::class)
            ->getForm();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $entityManager = $doctrine->getManager();
            $entityManager->persist($data);
            $entityManager->flush();
            return $this->redirect('/project');
        }
        return $this->render('front/addeditpage.html.twig', array(
            'form' => $form->createView(),
            'apkikey' => $apikey->key()
        ));
    }


    /**
     * @Route("/jsonAdd")
     */
    //z lokalnego pliku json pobiera dane i zapisuje je do bazy danych. Dane sa bardzo ogolne, do przerobienia na szczegolowy scan.
    // plik json uzyty w tej funkcji to dataTest.json jest w tym samym folderze. dump($alerts) wyswietla te alerty
    public function insertScan(ManagerRegistry $doctrine )
    {
//
        $jsondata = file_get_contents('/home/mateusz/Desktop/php_projects/pz2022nettom/src/Controller/dataTest.json');
        $data = json_decode($jsondata, true); // biorac dane z pliku (i pewnie z api tez) trzeba uzyc decode

        $alerts = $data['pageAlerts'];
        $entityManager = $doctrine->getManager();
        foreach ($alerts as $key => $values) { //dane w pliku sa oznaczone jako low medium high petla przechodzi przechodzi po kazdym z nich
            foreach ($values as $item => $value) { // przechodzi po kazdych danych z low/medium/high i wyciaga dane od razu zapisujac do bazy
                $scan = new ScanAlert();
                $scan->setEvidence($value['evidence']);
                $scan->setName($value['name']);
                $scan->setParam($value['param']);
                $scan->setRisk($value['risk']);
                $scan->setUri($value['uri']);
                $entityManager->persist($scan);
                $entityManager->flush();
            }
        }
        return dump($alerts);
    }

    /**
     * @Route ("/jsonScan")
     */
    public function showScans(GetScan $getScan){
        // wczesniejszy import z services/getscan oraz wywowalnie funkcji.
        //23.05  wyswietlenie szczegolowego scanu
        $scans = $getScan->getScans('http://localhost:6969/');
        $scan = json_decode($scans);
        return dump($scan);
    }
}
