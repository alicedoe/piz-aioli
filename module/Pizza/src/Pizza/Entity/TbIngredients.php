<?php

namespace Pizza\Entity;
use Doctrine\ORM\Mapping as ORM;


/** @ORM\Table(name="tb_ingredients") 
 * @ORM\Entity(repositoryClass="Pizza\Repository\Repository") */

class TbIngredients
{
    /**
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="AUTO")
    * @ORM\Column(type="integer", length=11)
    */
    protected $id;

    /** @ORM\Column(type="string", length=255) */
    protected $nom;
    
    /** @ORM\Column(type="float") */
    protected $prix;
    function getId() {
        return $this->id;
    }

    function getNom() {
        return $this->nom;
    }

    function getPrix() {
        return $this->prix;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }

    function setPrix($prix) {
        $this->prix = $prix;
    }


}

