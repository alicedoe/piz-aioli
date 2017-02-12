<?php

namespace Pizza\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TbVilles
 *
 * @ORM\Table(name="tb_villes")
 * @ORM\Entity
 */
class TbVilles
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="departement_id", type="string", length=3, nullable=false)
     */
    private $departementId;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=45, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="codepostal", type="string", length=255, nullable=false)
     */
    private $codepostal;

    function getId() {
        return $this->id;
    }

    function getDepartementId() {
        return $this->departementId;
    }

    function getNom() {
        return $this->nom;
    }

    function getCodepostal() {
        return $this->codepostal;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setDepartementId($departementId) {
        $this->departementId = $departementId;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }

    function setCodepostal($codepostal) {
        $this->codepostal = $codepostal;
    }


}

