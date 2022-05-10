<?php

namespace App\Controller;

use phpDocumentor\Reflection\Types\AbstractList;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class addpage extends AbstractController
{
    /**
     * @Route ("/addpage")
     *
     * */
    public function index(){
        return $this->render('front/addeditpage.html.twig');
    }
}