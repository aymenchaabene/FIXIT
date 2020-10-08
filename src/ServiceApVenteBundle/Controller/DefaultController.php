<?php

namespace ServiceApVenteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ServiceApVenteBundle:Default:index.html.twig');
    }
}
