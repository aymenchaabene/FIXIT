<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Prestations
 *
 * @ORM\Table(name="prestations")
 * @ORM\Entity
 */
class Prestations
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_prestation", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPrestation;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_demande", type="integer", nullable=true)
     */
    private $idDemande;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_prestataire", type="integer", nullable=true)
     */
    private $idPrestataire;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_user", type="integer", nullable=true)
     */
    private $idUser;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_rdv", type="date", nullable=true)
     */
    private $dateRdv;

    /**
     * @return int
     */
    public function getIdPrestation()
    {
        return $this->idPrestation;
    }

    /**
     * @param int $idPrestation
     */
    public function setIdPrestation($idPrestation)
    {
        $this->idPrestation = $idPrestation;
    }

    /**
     * @return int
     */
    public function getIdDemande()
    {
        return $this->idDemande;
    }

    /**
     * @param int $idDemande
     */
    public function setIdDemande($idDemande)
    {
        $this->idDemande = $idDemande;
    }

    /**
     * @return int
     */
    public function getIdPrestataire()
    {
        return $this->idPrestataire;
    }

    /**
     * @param int $idPrestataire
     */
    public function setIdPrestataire($idPrestataire)
    {
        $this->idPrestataire = $idPrestataire;
    }

    /**
     * @return int
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * @param int $idUser
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }

    /**
     * @return \DateTime
     */
    public function getDateRdv()
    {
        return $this->dateRdv;
    }

    /**
     * @param \DateTime $dateRdv
     */
    public function setDateRdv($dateRdv)
    {
        $this->dateRdv = $dateRdv;
    }


}

