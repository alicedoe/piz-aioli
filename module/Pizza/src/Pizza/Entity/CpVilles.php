<?php

namespace Pizza\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CpVilles
 *
 * @ORM\Table(name="cp_villes", indexes={@ORM\Index(name="ville_departement", columns={"ville_departement"}), @ORM\Index(name="ville_nom", columns={"ville_nom"}), @ORM\Index(name="ville_nom_reel", columns={"ville_nom_reel"}), @ORM\Index(name="ville_code_postal", columns={"ville_code_postal"}), @ORM\Index(name="ville_nom_simple", columns={"ville_nom_simple"})})
 * @ORM\Entity
 */
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


}

