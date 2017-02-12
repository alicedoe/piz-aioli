<?php

namespace Pizza\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TbUsers
 *
 * @ORM\Table(name="tb_users", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_7E68F519E7927C74", columns={"email"})}, indexes={@ORM\Index(name="villeNomReel", columns={"villeNomReel"})})
 * @ORM\Entity
 */
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
     * @var integer
     *
     * @ORM\Column(name="villeNomReel", type="integer", nullable=true)
     */
    private $villenomreel;


}

