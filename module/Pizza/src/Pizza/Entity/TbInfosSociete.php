<?php

namespace Pizza\Entity;
use Doctrine\ORM\Mapping as ORM;


/** @ORM\Table(name="tbInfos_Societe") 
 * @ORM\Entity(repositoryClass="Pizza\Repository\Repository") */

class TbInfosSociete
{
    
    /**
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="AUTO")
    * @ORM\Column(type="integer", length=11)
    */
    protected $id;
   
    /** @ORM\Column(type="string", length=255) */
    protected $adresse;

    /** @ORM\Column(type="string", length=255) */
    protected $numero_tel;
    
    /** @ORM\Column(type="string", length=255) */
    protected $email;
    
    /** @ORM\Column(type="string", length=255) */
   protected $map;
   
   function getId() {
       return $this->id;
   }

   function getAdresse() {
       return $this->adresse;
   }

   function getNumero_tel() {
       return $this->numero_tel;
   }

   function getEmail() {
       return $this->email;
   }

   function getMap() {
       return $this->map;
   }

   function setId($id) {
       $this->id = $id;
   }

   function setAdresse($adresse) {
       $this->adresse = $adresse;
   }

   function setNumero_tel($numero_tel) {
       $this->numero_tel = $numero_tel;
   }

   function setEmail($email) {
       $this->email = $email;
   }

   function setMap($map) {
       $this->map = $map;
   }


    
}