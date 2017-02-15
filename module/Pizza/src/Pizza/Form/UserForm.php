<?php

namespace Pizza\Form;

use Zend\Form\Form;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilter;

class UserForm extends Form implements InputFilterAwareInterface {

    public function __construct($entityManager, $set) {

        parent::__construct('User');
        $this->setAttribute('method', 'post');
        $this->add(array(
            'name' => 'userId', // Nom du champ
            'type' => 'Hidden', // Type du champ
        ));

        // Le champs name, de type Text
        $this->add(array(
            'name' => 'name', // Nom du champ
            'type' => 'Text', // Type du champ
            'attributes' => array(
                'id' => 'name', // Id du champ
                'value' => $set->getNom(),
            ),
            'options' => array(
                'label' => 'Nom', // Label à l'élément
            ),
        ));
        $this->add(array(
            'name' => 'prenon', // Nom du champ
            'type' => 'Text', // Type du champ
            'attributes' => array(
                'id' => 'prenon', // Id du champ
                'value' => $set->getPrenom(),
            ),
            'options' => array(
                'label' => 'Prenom', // Label à l'élément
            ),
        ));
        $this->add(array(
            'name' => 'pseudo', // Nom du champ
            'type' => 'Text', // Type du champ
            'attributes' => array(
                'id' => 'pseudo', // Id du champ
                'value' => $set->getPseudo(),
            ),
            'options' => array(
                'label' => 'Pseudo', // Label à l'élément
            ),
        ));
        $this->add(array(
            'name' => 'adresse', // Nom du champ
            'type' => 'Text', // Type du champ
            'attributes' => array(
                'id' => 'adresse', // Id du champ
                'value' => $set->getAdresse(),
            ),
            'options' => array(
                'label' => 'Adresse', // Label à l'élément
            ),
        ));

        $this->add(array(
            'name' => 'email', // Nom du champ
            'type' => 'text', // Type du champ
            'attributes' => array(
                'id' => 'email', // Id du champ
                'value' => $set->getEmail(),
            ),
            'options' => array(
                'label' => 'Email', // Label à l'élément
            ),
        ));
        $this->add(array(
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'name' => 'ville',
            'options' => array(
                'label' => 'Ville',
                'object_manager' => $entityManager,
                'target_class' => 'Forum\Entity\Ville',
                'property' => 'nomVille'
            )
        ));


        // Le bouton Submit
        $this->add(array(
            'name' => 'submit', // Nom du champ
            'type' => 'Submit', // Type du champ
            'attributes' => array(// On va définir quelques attributs
                'value' => 'Modifier', // comme la valeur
                'id' => 'submit', // et l'id
            ),
        ));
        $this->add(array(
            'name' => 'edit', // Nom du champ
            'type' => 'Submit', // Type du champ
            'attributes' => array(// On va définir quelques attributs
                'value' => 'Editer', // comme la valeur
                'id' => 'edit', // et l'id
            ),
        ));
    }

}