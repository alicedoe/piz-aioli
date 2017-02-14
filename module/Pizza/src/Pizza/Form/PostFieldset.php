<?php
// Filename: /module/Blog/src/Blog/Form/PostFieldset.php
namespace Pizza\Form;

use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilter;
use DoctrineModule\Persistence\ObjectManagerAwareInterface;

class PostFieldset extends Fieldset  implements InputFilterAwareInterface
{
    protected $inputFilter;
    protected $entityManager;
    
    public function __construct($entityManager) {
        $this->entityManager = $entityManager;
        
    }

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
                        'error_message' => 'Veuillez indiquer votre nom',
                        'filters' => array(// Différents filtres:
                            array('name' => 'StripTags'), // Pour retirer les tags HTML
                            array('name' => 'StringTrim'), // Pour supprimer les espaces avant et apres le nom
                        ),
                        'validators' => array(// Des validateurs
                            array(
                                'name' => 'StringLength', // Pour vérifier la longueur du nom
                                'options' => array(
                                    'encoding' => 'UTF-8', // La chaine devra être en UTF-8
                                    'min' => 3, // et une longueur entre 1 et 100
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
                        'error_message' => 'Veuillez indiquer votre prénom',
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
                        'name' => 'password', // Le nom du champ / de la propriété
                        'required' => true, // Champ requis                        
                        'error_message' => 'Veuillez indiquer un mot de passe assez long',
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
                                    'max' => 10,
                                ),
                            ),
                        ),
                    )
            );
            
            $inputFilter->add(
                    array(
                        'name' => 'numrue', // Le nom du champ / de la propriété
                        'required' => true, // Champ requis                        
                        'error_message' => 'Veuillez indiquer une adresse',
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
                                    'max' => 50,
                                ),
                            ),
                        ),
                    )
            );
            
            $inputFilter->add(
                    
                    array(
                        'name' => 'email',
                        'filters' => array(// Différents filtres:
                            array('name' => 'StripTags'), // Pour retirer les tags HTML
                            array('name' => 'StringTrim'), // Pour supprimer les espaces avant et apres le nom
                        ),
                        'validators' => array(                            
                            array(
                                'name' => 'NotEmpty',
                                'options' => array(
                                    'messages' => array(
                                        \Zend\Validator\NotEmpty::IS_EMPTY => _("Veuillez remplir la case email"),
                                    ),
                                ),
                            ),
                            array(
                                'name' => 'Regex',
                                'options' => array(
                                    'pattern' => '/^[a-zA-Z0-9.!#$%&\'*+\/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/',
                                    'messages' => array(
                                        \Zend\Validator\Regex::NOT_MATCH => 'Le format de l\'adresse email est incorrect',
                                    )
                                ),
                            ),
                            array( 
                                'name' => 'DoctrineModule\Validator\NoObjectExists',
                                'options' => array(
                                    'object_repository' => $this->entityManager->getRepository('Pizza\Entity\TbUsers'),
                                    'fields' => 'email',
                                    'message' => 'Un compte avec une adresse email identique à déjà été créé'
                                    ),
                                ),
                            ),
                        )
                    
                   
            );

            $this->inputFilter = $inputFilter;
        }

        return $this->inputFilter;
    }
}