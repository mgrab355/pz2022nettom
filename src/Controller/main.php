<?php

namespace App\Controller;

use App\Zap\Zapv2;
use phpDocumentor\Reflection\Types\AbstractList;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class main extends AbstractController
{
    /**
     * @Route ("/" name ="main")
     *
     * */
    public function index()
    {
        return $this->render('front/index.html.twig');
    }
}


