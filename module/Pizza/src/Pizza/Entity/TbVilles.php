<?php

namespace Pizza\Entity;
use Doctrine\ORM\Mapping as ORM;

/** @ORM\Table(name="tb_villes") 
 * @ORM\Entity(repositoryClass="Pizza\Repository\Repository") */

class TbVilles
{
    /**
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="AUTO")
    * @ORM\Column(type="integer", length=11)
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

}

