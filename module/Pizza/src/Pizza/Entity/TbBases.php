<?php

namespace Pizza\Entity;
use Doctrine\ORM\Mapping as ORM;

/** @ORM\Table(name="tb_bases") 
 * @ORM\Entity(repositoryClass="Pizza\Repository\Repository") */

class TbBases
{
    /**
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="AUTO")
    * @ORM\Column(type="integer", length=11)
    */
    protected $id;

    /** @ORM\Column(type="string", length=255) */
    protected $nom;
    function getId() {
        return $this->id;
    }

    function getNom() {
        return $this->nom;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }


}