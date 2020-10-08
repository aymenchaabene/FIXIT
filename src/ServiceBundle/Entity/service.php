<?php
/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 03/04/2019
 * Time: 19:15
 */

namespace  ServiceBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * service
 *
 * @ORM\Table(name="service")
 * @ORM\Entity
 */
class service
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var  \ServiceBundle\Entity\categorie
     *
     *  @ORM\ManyToOne(targetEntity="categorie")
     *
     *  @ORM\JoinColumns({
     * @ORM\JoinColumn(name="idCateg", referencedColumnName="id")
     *  })
     */

    private $idCateg;

    /**
     * @var \AppBundle\Entity\FosUser
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\FosUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id")
     * })
     */
    private $idUser;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255)
     *
     */
    private $image;

    /**
     * @var bool
     *
     * @ORM\Column(name="valide", type="boolean")
     */
    private $valide;

    /**
     * @var \string
     *
     * @ORM\Column(name="date", type="string", length=255)
     */
    private $date;

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
     * @return \ServiceBundle\Entity\categorie
     */
    public function getIdCateg()
    {
        return $this->idCateg;
    }

    /**
     * @param \ServiceBundle\Entity\categorie $idCateg
     */
    public function setIdCateg($idCateg)
    {
        $this->idCateg = $idCateg;
    }

    /**
     * @return \AppBundle\Entity\FosUser
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * @param \AppBundle\Entity\FosUser $idUser
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return bool
     */
    public function isValide()
    {
        return $this->valide;
    }

    /**
     * @param bool $valide
     */
    public function setValide($valide)
    {
        $this->valide = $valide;
    }

    /**
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param string $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }



}

