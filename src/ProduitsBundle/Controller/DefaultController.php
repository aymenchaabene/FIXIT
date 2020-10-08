<?php

namespace ProduitsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ProduitsBundle:Default:index.html.twig');
    }
}
