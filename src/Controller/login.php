<?php

namespace App\Controller;

use phpDocumentor\Reflection\Types\AbstractList;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class login extends AbstractController
{
    /**
     * @Route ("/login_front")
     *
     * */
    public function index(){
        return $this->render('front/login.html.twig');
    }
}