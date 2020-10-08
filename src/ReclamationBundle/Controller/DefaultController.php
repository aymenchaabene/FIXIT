<?php

namespace ReclamationBundle\Controller;

use AppBundle\Entity\ReclamationPrestation;
use AppBundle\Entity\ReclamationProduit;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexxAction()
    {
        $em = $this->getDoctrine()->getManager();
        $id = $this->getUser()->getId();
        $nom = $this->getUser()->getUsername();


        $formation = $em->getRepository('AppBundle:Prestations')->findBy(array('idUser'=>$id));
        $up = $em->getRepository('AppBundle:ReclamationPrestation')->findBy(array('nomPrestataire'=>$nom));

        return $this->render('ReclamationBundle:Default:index1.html.twig' , array('formation'=>$formation ,'up'=>$up));
    }



    public function recAction($idprestatire)

    {

        $em= $this->getDoctrine()->getManager();
        $formation = $em->getRepository('AppBundle:FosUser')->find($idprestatire);

        $request= $this->get('request_stack')->getCurrentRequest();
        if ($request->getMethod()=='POST' )
        {
            $Message=$request->get('Contenu_contact');
            $email=$request->get('Email');
            $nom=$request->get('Nom');
            $num=$request->get('Num');
            $prenom=$request->get('Prenom');
            $new = new ReclamationPrestation();
            $new->setDescription($Message);
            $new->setIdUser($this->getUser()->getId());
            $new->setEMail($email);
            $new->setNom($nom);
            $new->setNomPrestataire($formation->getUsername());
            $new->setNum($num);
            $new->setPrenom($prenom);

            $em->persist($new);
            $em->flush();
            return $this->redirectToRoute('reclamation_homepage1');
        }

        return $this->render('@Reclamation/Default/formulaire.html.twig');
    }

    public function listeAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $rec = $request->get('Event');
        $id=$this->getUser();
        $list = $em->getRepository("AppBundle:ReclamationPrestation")->rechercheMarque($rec,$id);

        return $this->render('@Reclamation/Default/liste.html.twig',array('liste'=>$list));
    }

    public function ReclamationAdminAction()
    {
        $em = $this->getDoctrine()->getManager();

        ## code envoi d'un mail ##
        $etat = $em->getRepository('AppBundle:ReclamationPrestation')->findAll();

        return $this->render('ReclamationBundle:Default:Admin_reclamation.html.twig',array('et'=>$etat));

    }

    public function inverseAction($idreclamation)
    {
        $em = $this->getDoctrine()->getManager();

        ## code envoi d'un mail ##
        $etat = $em->getRepository('AppBundle:ReclamationPrestation')->find($idreclamation);
        $etat->setEtat(0);
        $em->persist($etat);
        $em->flush();

        return $this->redirectToRoute('ReclamationAdmin');
    }

    public function envoiAction($idreclamation)
    {



        $em = $this->getDoctrine()->getManager();

        ## code envoi d'un mail ##
        $etat = $em->getRepository('AppBundle:ReclamationPrestation')->find($idreclamation);
        $etat->setEtat(1);
        $em->persist($etat);
        $em->flush();
        $name=$etat->getNom();
        $des=$etat->getDescription();

        $message = (new \Swift_Message('Hello Email'))
            ->setFrom('karim.massoudi@outlook.com')
            ->setTo('karim.massoudi@esprit.tn')
            ->setBody(
                $this->renderView(
                // app/Resources/views/Emails/registration.html.twig
                    '@Reclamation/Default/mail.html.twig',
                    array('name' => $name,'desc'=>$des)
                ),
                'text/html'
            )
            /*
             * If you also want to include a plaintext version of the message
            ->addPart(
                $this->renderView(
                    'Emails/registration.txt.twig',
                    array('name' => $name)
                ),
                'text/plain'
            )
            */
        ;

        $this->get('mailer')->send($message);

        return $this->redirectToRoute('ReclamationAdmin');
    }

    public function suppAdminAction($idreclamation)
    {
        $em = $this->getDoctrine()->getManager();

        ## code envoi d'un mail ##
        $etat = $em->getRepository('AppBundle:ReclamationPrestation')->find($idreclamation);

        $em->remove($etat);
        $em->flush();

        return $this->redirectToRoute('ReclamationAdmin');

    }

    public function modiAction($idReclamationPrestation)
    {
        $em = $this->getDoctrine()->getManager();


        $up = $em->getRepository('AppBundle:ReclamationPrestation')->find($idReclamationPrestation);
        $formation = $em->getRepository('AppBundle:FosUser')->findby(array('username'=>$up->getNomPrestataire()));


        $request= $this->get('request_stack')->getCurrentRequest();
        if ($request->getMethod()=='POST' )
        {
            $etat = $em->getRepository('AppBundle:ReclamationPrestation')->find($idReclamationPrestation);
            $Message=$request->get('Contenu_contact');
            $email=$request->get('Email');
            $nom=$request->get('Nom');
            $num=$request->get('Num');
            $prenom=$request->get('Prenom');
            $etat->setDescription($Message);
            $etat->setIdUser($this->getUser()->getId());
            $etat->setEMail($email);
            $etat->setNom($nom);
            $etat->setNomPrestataire($formation[0]->getUsername());
            $etat->setNum($num);
            $etat->setPrenom($prenom);
            $em->persist($etat);
            $em->flush();
            return $this->redirectToRoute('liste');

        }
        return $this->render('@Reclamation/Default/update.html.twig',array('up'=>$up));
    }

    #### produits

    public function RecProduitsAction()
    {
        $em = $this->getDoctrine()->getManager();
        $formation = $em->getRepository('ProduitsBundle:Produit')->findAll();
        $rating = $em->getRepository('ProduitsBundle:Produit')->findAll();

        return $this->render('ReclamationBundle:Default:LesProduits.html.twig' , array('formation'=>$formation,'rating1'=>$rating ));
    }

    public function reclamationProduitAction($idproduit)

    {

        $em= $this->getDoctrine()->getManager();
        $formation = $em->getRepository('ProduitsBundle:Produit')->find($idproduit);

        $request= $this->get('request_stack')->getCurrentRequest();
        if ($request->getMethod()=='POST' )
        {
            $Message=$request->get('Description');
            $email=$request->get('Email');
            $nom=$request->get('Nom');
            $num=$request->get('Num');
            $prenom=$request->get('Prenom');
            $new = new ReclamationProduit();
            $new->setDescription($Message);
            $new->setIdUser($this->getUser()->getId());
            $new->setEMail($email);
            $new->setNom($nom);
            $new->setNomProduit($formation->getNom());
            $new->setNum($num);
            $new->setPrenom($prenom);

            $em->persist($new);
            $em->flush();
            return $this->redirectToRoute('RecProduits');
        }

        return $this->render('@Reclamation/Default/formulaire_produits.html.twig');
    }

    public function liste_rec_prodAction()
    {
        $em = $this->getDoctrine()->getManager();
        $id = $this->getUser()->getId();


        $formation = $em->getRepository('AppBundle:ReclamationProduit')->findBy(array('idUser'=>$id));

        return $this->render('ReclamationBundle:Default:Liste_reclamation_produit.html.twig' , array('formation'=>$formation ));
    }

    public function modi1Action($nomprduit,$idReclamationProduit)
    {
        $em = $this->getDoctrine()->getManager();


         $formation= $em->getRepository('ProduitsBundle:Produit')->findby(array('nom'=>$nomprduit));
        $etat = $em->getRepository('AppBundle:ReclamationProduit')->find($idReclamationProduit);

        $request= $this->get('request_stack')->getCurrentRequest();
        if ($request->getMethod()=='POST' )
        {

            $Message=$request->get('Contenu_contact');
            $email=$request->get('Email');
            $nom=$request->get('Nom');
            $num=$request->get('Num');
            $prenom=$request->get('Prenom');
            $etat->setDescription($Message);
            $etat->setIdUser($this->getUser()->getId());
            $etat->setEMail($email);
            $etat->setNom($nom);
            $etat->setNomProduit($formation[0]->getNom());
            $etat->setNum($num);
            $etat->setPrenom($prenom);

            $em->persist($etat);
            $em->flush();
            return $this->redirectToRoute('liste_rec_prod');


        }
        return $this->render('@Reclamation/Default/update_rec_produit.html.twig',array('up'=>$etat));
    }

    public function ReclamationProduitAdminAction()
    {
        $em = $this->getDoctrine()->getManager();

        ## code envoi d'un mail ##
        $etat = $em->getRepository('AppBundle:ReclamationProduit')->findAll();

        return $this->render('ReclamationBundle:Default:AdminReclamation_Produit.html.twig',array('et'=>$etat));

    }


    public function inverse1Action($idreclamation1)
    {
        $em = $this->getDoctrine()->getManager();

        ## code envoi d'un mail ##
        $etat = $em->getRepository('AppBundle:ReclamationProduit')->find($idreclamation1);
        $etat->setEtat(0);
        $em->persist($etat);
        $em->flush();

        return $this->redirectToRoute('ReclamationProduitAdmin');
    }

    public function envoi1Action($idreclamation1)
    {



        $em = $this->getDoctrine()->getManager();

        ## code envoi d'un mail ##
        $etat = $em->getRepository('AppBundle:ReclamationProduit')->find($idreclamation1);
        $etat->setEtat(1);
        $em->persist($etat);
        $em->flush();
        $name=$etat->getNom();
        $des=$etat->getDescription();

        $message = (new \Swift_Message('Hello Email'))
            ->setFrom('karim.massoudi@outlook.com')
            ->setTo('karim.massoudi@esprit.tn')
            ->setBody(
                $this->renderView(
                // app/Resources/views/Emails/registration.html.twig
                    '@Reclamation/Default/mail.html.twig',
                    array('name' => $name,'desc'=>$des)
                ),
                'text/html'
            )
            /*
             * If you also want to include a plaintext version of the message
            ->addPart(
                $this->renderView(
                    'Emails/registration.txt.twig',
                    array('name' => $name)
                ),
                'text/plain'
            )
            */
        ;

        $this->get('mailer')->send($message);

        return $this->redirectToRoute('ReclamationProduitAdmin');
    }

    public function suppAdmin1Action($idreclamation1)
    {
        $em = $this->getDoctrine()->getManager();

        ## code envoi d'un mail ##
        $etat = $em->getRepository('AppBundle:ReclamationProduit')->find($idreclamation1);

        $em->remove($etat);
        $em->flush();

        return $this->redirectToRoute('ReclamationProduitAdmin');

    }

    public function traiAction($idreclamation1)
    {
        $em = $this->getDoctrine()->getManager();

        ## code envoi d'un mail ##
        $etat = $em->getRepository('AppBundle:ReclamationProduit')->find($idreclamation1);
        $etat->setEtat(2);
        $em->persist($etat);
        $em->flush();

        return $this->redirectToRoute('ReclamationProduitAdmin');
    }


    public function trai1Action($idreclamation)
    {
        $em = $this->getDoctrine()->getManager();

        ## code envoi d'un mail ##
        $etat = $em->getRepository('AppBundle:ReclamationPrestation')->find($idreclamation);
        $etat->setEtat(2);
        $em->persist($etat);
        $em->flush();

        return $this->redirectToRoute('ReclamationAdmin');
    }

}
