<?php

namespace CommandesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Facture
 *
 * @ORM\Table(name="facture")
 * @ORM\Entity
 */
class Facture
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_facture", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idFacture;

    /**
     * @var \AppBundle\Entity\FosUser
     *
     * @ORM\ManyToOne(targetEntity="\AppBundle\Entity\FosUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idUser", referencedColumnName="id")
     * })
     */
    private $idUser;



    /**
     * @var integer
     *
     * @ORM\Column(name="prix_totale", type="integer", nullable=true)
     */
    private $prixTotale = '0';

    /**
     * @return int
     */
    public function getIdFacture()
    {
        return $this->idFacture;
    }

    /**
     * @param int $idFacture
     */
    public function setIdFacture($idFacture)
    {
        $this->idFacture = $idFacture;
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
     * @return \CommandesBundle\Entity\Commande
     */
    public function getIdCommande()
    {
        return $this->idCommande;
    }

    /**
     * @param \CommandesBundle\Entity\Commande $idCommande
     */
    public function setIdCommande($idCommande)
    {
        $this->idCommande = $idCommande;
    }

    /**
     * @return int
     */
    public function getPrixTotale()
    {
        return $this->prixTotale;
    }

    /**
     * @param int $prixTotale
     */
    public function setPrixTotale($prixTotale)
    {
        $this->prixTotale = $prixTotale;
    }


}

