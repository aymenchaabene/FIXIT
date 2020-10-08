<?php

namespace CommandesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CommandesBundle:Default:index.html.twig');
    }
}
