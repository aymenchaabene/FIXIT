<?php

namespace ProduitsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ProduitsBundle\Entity\Produit;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class ProduitsController extends Controller
{
    public function indexAction()
    {
        return $this->render('ProduitsBundle:Default:produit.html.twig');
    }

    public function listeProduitAction(){
        $em= $this->getDoctrine()->getManager();
        $Produits=$em->getRepository("ProduitsBundle:Produit")->findAll();
        return $this->render('ProduitsBundle:Default:liste_produits.html.twig', array("produits"=>$Produits));

    }
    public function ajoutproduitAction(Request $request)
    {

        $Produit = new Produit();
        $em= $this->getDoctrine()->getManager();
        $fournisseurs = $em->getRepository("ProduitsBundle:Fournisseur")->findAll();
        if ($request->isMethod('POST')) {

            $Produit->setNom($request->get('nom'));
            $Produit->setDescription($request->get('description'));
            $Produit->setReference($request->get('reference'));
            $Produit->setPrix($request->get('prix'));
            $Produit->setCategorie($request->get('categorie'));
            $Produit->setQuantite($request->get('quantite'));
            $Fournisseur = $em->getRepository("ProduitsBundle:Fournisseur")->find($request->get('fournisseur'));
            $Produit->setFournisseurId($Fournisseur);
            $file = $request->files->get('image');
            $fileName = $file->getClientOriginalName();
            $file->move($this->container->getParameter('path_image_produit'),$fileName);
            $Produit->setImage($fileName);


            $em = $this->getDoctrine()->getManager();
            $em->persist($Produit);
            $em->flush();
            return $this->redirectToRoute('produits_listeProduit');


        }
        return $this->render('ProduitsBundle:Default:ajoutproduit.html.twig',array("fournisseurs"=>$fournisseurs));


    }
}
