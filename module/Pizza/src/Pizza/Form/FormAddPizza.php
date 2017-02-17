<?php

namespace Pizza\Form;

use Zend\Form\Element;
use Zend\Form\Form;

class FormAddPizza extends Form {

    public function __construct($objectManager, $set) {

        parent::__construct("FormAddPizza");
        $this->setAttribute('method', 'post');
        $this->setAttribute('enctype','multipart/form-data');
        
        $this->add(array(
                'name' => 'id', // Nom du champ
                'attributes' => array(
                  'value' => $set->getId(),
                ),
                'type' => 'Hidden',      // Type du champ
            ));
        $this->add(array(
            'name' => 'nom',
            'attributes' => array(
                'id' => 'nom',
                'class' => 'form-control input-sm',
                'placeholder' => 'Nom de la pizza',
                    'value' => $set->getNom(),
            )
        ));

        $this->add(array(
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'name' => 'base',
            'attributes' => array(
                'value' => $set->getBase(),
            ),
            'options' => array(
                'label' => 'base',
                'object_manager' => $objectManager,
                'target_class' => 'Pizza\Entity\TbBases',
                'property' => 'nom'
            )
        ));
        $this->add(array(
            'type' => 'DoctrineModule\Form\Element\ObjectMultiCheckbox',
            'name' => 'ingredients',            
            'attributes' => array(
                'value' => $set->getIngredients(),
            ),
            'options' => array(
                'label' => 'Please Select Your Availablity',
                'object_manager' => $objectManager,
                'target_class' => 'Pizza\Entity\TbIngredients',
                'property' => 'nom'
            )
        ));

         $this->add(array(
            'type' => 'Zend\Form\Element\Checkbox',
            'name' => 'pizofday',
             'attributes' => array(
                'value' => $set->getPizofday(),
            ),
            'options' => array(
                'label' => 'Pizza du jour',
                'checked_value' => 1,
                'unchecked_value' => '0'
            ),
        ));
         
         $this->add(array(
            'type' => 'Zend\Form\Element\Checkbox',
            'name' => 'pizza_au_menu',
             'attributes' => array(
                'value' => $set->getPizza_au_menu(),
            ),
            'options' => array(
                'label' => 'Pizza à la carte',
                'checked_value' => 1,
                'unchecked_value' => '0'
            ),
        ));
         
         $this->add(array(
            'name' => 'prix',
            'options' => array(
                'label' => 'prix'
            ),
             'attributes' => array(
                'id' => 'prix',
                'class' => 'form-control',
                'placeholder' => 'Prix de la pizza',
                 'value' => $set->getPrix(),
            )
        ));


        $this->add(array(
            'name' => 'fileupload',
            'attributes' => array(
                'type'  => 'file'
            ),
            'options' => array(
                'label' => 'Photo d\'illustration',
            ),
        ));

        $this->add(array(
            'name' => 'submit',
            'type' => 'Zend\Form\Element\Submit',
            'attributes' => array(
                'value' => 'Ajouter une pizza',
               'class' => 'btn btn-default btn-wide btn-success'
            )
        ));
        
        $this->add(array(
            'name' => 'submit2',
            'type' => 'Zend\Form\Element\Submit',
            'attributes' => array(
                'value' => 'Modifier la pizza',
               'class' => 'btn btn-default btn-wide btn-success'
            )
        ));
    }

}
