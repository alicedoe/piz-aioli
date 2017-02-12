<?php

namespace Pizza\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TbUsers
 *
 * @ORM\Table(name="tb_users") 
 * @ORM\Entity(repositoryClass="Pizza\Repository\Repository") */
class TbUsers
{
    /**
     * @var integer
     *
     * @ORM\Column(name="user_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $userId;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="role", type="string", length=10, nullable=false)
     */
    private $role;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=128, nullable=false)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=128, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=128, nullable=false)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="numrue", type="string", length=128, nullable=false)
     */
    private $numrue;

    /**
     * @var \Pizza\Entity\TbVilles
     *
     * @ORM\ManyToOne(targetEntity="Pizza\Entity\TbVilles")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ville", referencedColumnName="id")
     * })
     */
    private $ville;

    function getUserId() {
        return $this->userId;
    }

    function getEmail() {
        return $this->email;
    }

    function getRole() {
        return $this->role;
    }

    function getPassword() {
        return $this->password;
    }

    function getNom() {
        return $this->nom;
    }

    function getPrenom() {
        return $this->prenom;
    }

    function getNumrue() {
        return $this->numrue;
    }

    function getVille(): \Pizza\Entity\TbVilles {
        return $this->Ville;
    }

    function setUserId($userId) {
        $this->userId = $userId;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setRole($role) {
        $this->role = $role;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }

    function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    function setNumrue($numrue) {
        $this->numrue = $numrue;
    }

    function setVille(\Pizza\Entity\TbVilles $ville) {
        $this->ville = $ville;
    }


}

