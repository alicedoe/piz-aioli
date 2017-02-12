<?php

namespace Pizza\Entity;

use Doctrine\ORM\Mapping as ORM;

/** @ORM\Table(name="cp_villes") 
 * @ORM\Entity(repositoryClass="Pizza\Repository\Repository") */
class CpVilles
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ville_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $villeId;

    /**
     * @var string
     *
     * @ORM\Column(name="ville_departement", type="string", length=3, nullable=true)
     */
    private $villeDepartement;

    /**
     * @var string
     *
     * @ORM\Column(name="ville_slug", type="string", length=255, nullable=true)
     */
    private $villeSlug;

    /**
     * @var string
     *
     * @ORM\Column(name="ville_nom", type="string", length=45, nullable=true)
     */
    private $villeNom;

    /**
     * @var string
     *
     * @ORM\Column(name="ville_nom_simple", type="string", length=45, nullable=true)
     */
    private $villeNomSimple;

    /**
     * @var string
     *
     * @ORM\Column(name="ville_nom_reel", type="string", length=45, nullable=true)
     */
    private $villeNomReel;

    /**
     * @var string
     *
     * @ORM\Column(name="ville_code_postal", type="string", length=255, nullable=true)
     */
    private $villeCodePostal;
    function getVilleId() {
        return $this->villeId;
    }

    function getVilleDepartement() {
        return $this->villeDepartement;
    }

    function getVilleSlug() {
        return $this->villeSlug;
    }

    function getVilleNom() {
        return $this->villeNom;
    }

    function getVilleNomSimple() {
        return $this->villeNomSimple;
    }

    function getVilleNomReel() {
        return $this->villeNomReel;
    }

    function getVilleCodePostal() {
        return $this->villeCodePostal;
    }

    function setVilleId($villeId) {
        $this->villeId = $villeId;
    }

    function setVilleDepartement($villeDepartement) {
        $this->villeDepartement = $villeDepartement;
    }

    function setVilleSlug($villeSlug) {
        $this->villeSlug = $villeSlug;
    }

    function setVilleNom($villeNom) {
        $this->villeNom = $villeNom;
    }

    function setVilleNomSimple($villeNomSimple) {
        $this->villeNomSimple = $villeNomSimple;
    }

    function setVilleNomReel($villeNomReel) {
        $this->villeNomReel = $villeNomReel;
    }

    function setVilleCodePostal($villeCodePostal) {
        $this->villeCodePostal = $villeCodePostal;
    }



}

