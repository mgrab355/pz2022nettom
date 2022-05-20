<?php

namespace App\Controller;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use \Symfony\Component\Form\Extension\Core\Type\TextType;
use App\Entity\Project;
use Doctrine\Persistence\ManagerRegistry;
use \Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Services\ApiKey;



class addpage extends AbstractController
{
    /**
     * @Route ("/addpage" name='add_page')
     *
     * */

        public function index(ManagerRegistry $doctrine, Request $request, ApiKey $apiKey )
    {
        $project = new Project();
        $form = $this->createFormBuilder($project)
            ->add('Name', TextType::class)
            ->add('url', TextType::class)
            ->add('users', TextType::class)
//            ->add('icon', TextType::class)
            ->getForm();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form -> isValid()){
            $data = $form->getData();
            $entityManager = $doctrine->getManager();
            $entityManager->persist($data);
            $entityManager->flush();
            return $this->redirect('/project');
        }
        return $this->render('front/addeditpage.html.twig', array(
            'form' => $form->createView()),
    }


    /**
     * @Route("/raport/all")
     */
    public function side_bar(ManagerRegistry $doctrine): Response
    {
        $raport = $doctrine->getRepository(Project::class)->findAll();

        if (!$raport) {
            throw $this->createNotFoundException(
                'no raports was found '
            );
        }
        return $this->Render('main/show.html.twig', array('raports' => $raport));

    }
}

//        // create curl resource
//        $ch = curl_init();
//        // set url
//        curl_setopt($ch, CURLOPT_URL, "http://127.0.0.1:8080/JSON/ascan/action/scan/?apikey=mrfr81krgb3arenv01gi4k9uk9&url=https://localhost:6969/login_front&recurse=&inScopeOnly=&scanPolicyName=&method=&postData=&contextId=");
//        //return the transfer as a string
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
//        // $output contains the output string
//        $output = curl_exec($ch);
//        $err = curl_error($ch);
//
//        // close curl resource to free up system resources
//        curl_close($ch);
//
//        dump($output);
//        dump($err);