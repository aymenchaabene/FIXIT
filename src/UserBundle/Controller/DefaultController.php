<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {

        if ($this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            return $this->redirectToRoute('admin_homepage');
        }
        else if
        ($this->get('security.authorization_checker')->isGranted('ROLE_CLIENT')) {
            return $this->redirectToRoute('client_homepage');
        }

        else if
        ($this->get('security.authorization_checker')->isGranted('ROLE_PRESTATAIRE')) {
            return $this->redirectToRoute('prestataire_homepage');
        }




        return $this->render('@User/Default/index.html.twig');
    }


    public function clientAction()
    {


        return $this->render('@User/Security/Client_home.html.twig');
    }

    public function presAction()
    {


        return $this->render('@User/Security/Prestataire_home.html.twig');
    }

    public function adminAction()
    {
        return $this->render('@User/Security/admin_home.html.twig');
    }



    }
