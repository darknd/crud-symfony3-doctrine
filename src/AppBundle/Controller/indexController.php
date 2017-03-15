<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class indexController extends Controller
{
    /**
     * @Route("/")
     */

    public function showMenu()
    {
        return $this->render('menu.html.twig');
    }

}