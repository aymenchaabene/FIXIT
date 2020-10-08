<?php

namespace AppBundle\Entity;
use FOS\UserBundle\Model\User as BaseUser;

use Doctrine\ORM\Mapping as ORM;

/**
 * FosUser
 *
 * @ORM\Table(name="fos_user")
 * @ORM\Entity
 */
class FosUser extends BaseUser
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;


    /**
     * @var string
     *
     * @ORM\Column(name="cin", type="string", length=8, nullable=true)
     */
    private $cin;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=30, nullable=true)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=30, nullable=true)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="sexe", type="string", length=30, nullable=true)
     */
    private $sexe;

    /**
     * @var string
     *
     * @ORM\Column(name="date_naissance", type="string", length=30, nullable=true)
     */
    private $dateNaissance;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=30, nullable=true)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="num_tel", type="string", length=30, nullable=true)
     */
    private $numTel;

    /**
     * @var string
     *
     * @ORM\Column(name="photo_profil", type="string", length=30, nullable=true)
     */
    private $photoProfil;

    /**
     * @var string
     *
     * @ORM\Column(name="specialite", type="string", length=30, nullable=true)
     */
    private $specialite;

    /**
     * @var float
     *
     * @ORM\Column(name="Nb_Points", type="float", precision=10, scale=0, nullable=true)
     */
    private $nbPoints;



    /**
     * @var integer
     *
     * @ORM\Column(name="Desactiver", type="integer", nullable=true)
     */
    private $desactiver;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=8, nullable=true)
     */
    private $code;


    /**
     * @var string
     *
     * @ORM\Column(name="Etat", type="string", length=11, nullable=true)
     */
    private $etat;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getCin()
    {
        return $this->cin;
    }

    /**
     * @param string $cin
     */
    public function setCin($cin)
    {
        $this->cin = $cin;
    }

    /**
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param string $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @return string
     */
    public function getSexe()
    {
        return $this->sexe;
    }

    /**
     * @param string $sexe
     */
    public function setSexe($sexe)
    {
        $this->sexe = $sexe;
    }

    /**
     * @return string
     */
    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    /**
     * @param string $dateNaissance
     */
    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;
    }

    /**
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @param string $adresse
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

    /**
     * @return string
     */
    public function getNumTel()
    {
        return $this->numTel;
    }

    /**
     * @param string $numTel
     */
    public function setNumTel($numTel)
    {
        $this->numTel = $numTel;
    }

    /**
     * @return string
     */
    public function getPhotoProfil()
    {
        return $this->photoProfil;
    }

    /**
     * @param string $photoProfil
     */
    public function setPhotoProfil($photoProfil)
    {
        $this->photoProfil = $photoProfil;
    }

    /**
     * @return string
     */
    public function getSpecialite()
    {
        return $this->specialite;
    }

    /**
     * @param string $specialite
     */
    public function setSpecialite($specialite)
    {
        $this->specialite = $specialite;
    }

    /**
     * @return float
     */
    public function getNbPoints()
    {
        return $this->nbPoints;
    }

    /**
     * @param float $nbPoints
     */
    public function setNbPoints($nbPoints)
    {
        $this->nbPoints = $nbPoints;
    }


    /**
     * @return int
     */
    public function getDesactiver()
    {
        return $this->desactiver;
    }

    /**
     * @param int $desactiver
     */
    public function setDesactiver($desactiver)
    {
        $this->desactiver = $desactiver;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return string
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * @param string $etat
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;
    }



}

