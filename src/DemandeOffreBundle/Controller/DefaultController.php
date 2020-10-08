<?php

namespace DemandeOffreBundle\Controller;
use AppBundle\Entity\FosUser;
use DemandeOffreBundle\Entity\Offre;
use DemandeOffreBundle\Form\OffreType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('DemandeOffreBundle:Default:index.html.twig');


    }
    public function AffichageAction()
    {
       // $user=$this->getUser();
        $offres=$this->getDoctrine()->getRepository(Offre::class)->findAll();
        return $this->render('@DemandeOffre/Default/affichage.html.twig',array('offres'=>$offres));
    }
    public function ajoutAction(Request $request)
    {
        $offre=new Offre();
        //prepare the form with the function: createForm()
        $form=$this->createForm(OffreType::class,$offre);
        //extract the form answer from the received request
        $form=$form->handleRequest($request);
        //if this form is valid
        if($form->isValid()){
            //create an entity manager object
            $file = $offre->getPhoto();

            $fileName = $this->generateUniqueFileName().'.'.$file->guessExtension();

            try {
                $file->move(
                    $this->getParameter('annonce_directory'),
                    $fileName
                );
            } catch (FileException $e) {
                // ... handle exception if something happens during file upload
            }

            // updates the 'brochure' property to store the PDF file name
            // instead of its contents
            $offre->setPhoto($fileName);
            $offre->setUser($this->getUser());
            $em = $this->getDoctrine()->getManager();
            $em->persist($offre);
            $em->flush();
            //persist the object $modele in the ORM
            //redirect the route after the add
            return $this->redirectToRoute('affichage_la_liste_d_offre');

        }
        return $this->render('@DemandeOffre/Default/ajout.html.twig',
            array(
                'form'=>$form->createView()
            ));
    }


}
