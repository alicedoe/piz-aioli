<?php

namespace Pizza\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilter;

/**
 * TbUsers
 *
 * @ORM\Table(name="tb_users") 
 * @ORM\Entity(repositoryClass="Pizza\Repository\Repository") */
class TbUsers implements InputFilterAwareInterface {

    public function setInputFilter(\Zend\InputFilter\InputFilterInterface $inputFilter) {
        $this->inputFilter = $inputFilter;
    }

    // La méthode qui nous intéresse
    public function getInputFilter() {
        if (!$this->inputFilter) {
            $inputFilter = new InputFilter();

            $inputFilter->add(
                    array(
                        'name' => 'nom', // Le nom du champ / de la propriété
                        'required' => true, // Champ requis
                        'filters' => array(// Différents filtres:
                            array('name' => 'StripTags'), // Pour retirer les tags HTML
                            array('name' => 'StringTrim'), // Pour supprimer les espaces avant et apres le nom
                        ),
                        'validators' => array(// Des validateurs
                            array(
                                'name' => 'StringLength', // Pour vérifier la longueur du nom
                                'options' => array(
                                    'encoding' => 'UTF-8', // La chaine devra être en UTF-8
                                    'min' => 5, // et une longueur entre 1 et 100
                                    'max' => 30,
                                ),
                            ),
                        ),
                    )
            );
            $inputFilter->add(
                    array(
                        'name' => 'prenom', // Le nom du champ / de la propriété
                        'required' => true, // Champ requis
                        'filters' => array(// Différents filtres:
                            array('name' => 'StripTags'), // Pour retirer les tags HTML
                            array('name' => 'StringTrim'), // Pour supprimer les espaces avant et apres le nom
                        ),
                        'validators' => array(// Des validateurs
                            array(
                                'name' => 'StringLength', // Pour vérifier la longueur du nom
                                'options' => array(
                                    'encoding' => 'UTF-8', // La chaine devra être en UTF-8
                                    'min' => 5, // et une longueur entre 1 et 100
                                    'max' => 30,
                                ),
                            ),
                        ),
                    )
            );
            $this->add(
                    array(
                        'name' => 'email',
                        'required' => true,
                        'validators' => array(
                            array(
                                'name' => 'email',
                                'options' => array(
                                    'message' => array(
                                        \Zend\Validator\EmailAddress::INVALID => "Invalid type given. String expected",
                                        \Zend\Validator\EmailAddress::INVALID_FORMAT => "The input is not a valid email address. Use the basic format local-part@hostname",
                                        \Zend\Validator\EmailAddress::INVALID_HOSTNAME => "'%hostname%' is not a valid hostname for the email address",
                                        \Zend\Validator\EmailAddress::INVALID_MX_RECORD => "'%hostname%' does not appear to have any valid MX or A records for the email address",
                                        \Zend\Validator\EmailAddress::INVALID_SEGMENT => "'%hostname%' is not in a routable network segment. The email address should not be resolved from public network",
                                        \Zend\Validator\EmailAddress::DOT_ATOM => "'%localPart%' can not be matched against dot-atom format",
                                        \Zend\Validator\EmailAddress::QUOTED_STRING => "'%localPart%' can not be matched against quoted-string format",
                                        \Zend\Validator\EmailAddress::INVALID_LOCAL_PART => "'%localPart%' is not a valid local part for the email address",
                                        \Zend\Validator\EmailAddress::LENGTH_EXCEEDED => "The input exceeds the allowed length",
                                    ),
                                ),
                            ),
                        ),
            ));

            $this->inputFilter = $inputFilter;
        }

        return $this->inputFilter;
    }

    public function exchangeArray($data) {
        $this->userId = (isset($data['userId'])) ? $data['userId'] : null;
        $this->email = (isset($data['email'])) ? $data['email'] : null;
        $this->password = (isset($data['password'])) ? $data['password'] : null;
        $this->nom = (isset($data['nom'])) ? $data['nom'] : null;
        $this->prenom = (isset($data['prenom'])) ? $data['prenom'] : null;
        $this->numrue = (isset($data['numrue'])) ? $data['numrue'] : null;
        $this->role = 'user';
    }

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
     * @ORM\ManyToOne(targetEntity="TbVilles", cascade={"persist"})
     * @ORM\JoinColumn(name="ville", referencedColumnName="id", nullable=false)
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

    function getVille() {
        return $this->ville;
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

    function setVille($ville) {
        $this->ville = $ville;
    }

}
