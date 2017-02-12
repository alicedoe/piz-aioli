<?php
    namespace Pizza\Form;
    use Zend\Form\Form;
    
    
    // Notre class CategoryForm étend l'élément \Zend\Form\Form; 
    class LogForm extends Form
    {
        public function __construct($objectManager)
        {   
          
            parent::__construct('Log');
      
            $this->setAttribute('method', 'post');
            $this->add(array(
                'name' => 'id_membre', // Nom du champ
                'type' => 'Hidden',      // Type du champ
            ));
            
            // Le champs name, de type Text
            $this->add(array(
                'required'=>true,
                'name' => 'email',       // Nom du champ
                'type' => 'Text',       // Type du champ
                'attributes' => array(
                    'id'    => 'email',
                    'placeholder'  => 'Adresse email',
                    'class' => 'form-control'
                ),
                'options' => array(
                    'label' => 'Adresse email',   // Label à l'élément
                ),
            ));
            $this->add(array(
                'required'=>true,
                'name' => 'numrue',       // Nom du champ
                'type' => 'Text',       // Type du champ
                'attributes' => array(
                    'id'    => 'numrue',
                    'placeholder'  => 'Numéro et nom de rue',
                    'class' => 'form-control'
                ),
                'options' => array(
                    'label' => 'Numéro et nom de rue',   // Label à l'élément
                ),
            ));
            $this->add(array(
                'required'=>true,
                'name' => 'nom',       // Nom du champ
                'type' => 'Text',       // Type du champ
                'attributes' => array(
                    'id'    => 'nom',
                    'placeholder'  => 'Votre nom',
                    'class' => 'form-control'
                ),
                'options' => array(
                    'label' => 'Votre nom',   // Label à l'élément
                ),
            ));
            $this->add(array(
                'required'=>true,
                'name' => 'prenom',       // Nom du champ
                'type' => 'Text',       // Type du champ
                'attributes' => array(
                    'id'    => 'prenom',
                    'placeholder'  => 'Votre prénom',
                    'class' => 'form-control'
                ),
                'options' => array(
                    'label' => 'Votre prénom',   // Label à l'élément
                ),
            ));
            $this->add(array(
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'name' => 'ville',
            'options' => array(
                'label' => 'Ville',
                'placeholder'  => 'Ville',
                'object_manager' => $objectManager,
                'target_class' => 'Pizza\Entity\TbVilles',
                'property' => 'nom'
            )
        ));
           
                $this->add(array(
                'required'=>true,
                'name' => 'password',       // Nom du champ
                'type' => 'Text',       // Type du champ
                'attributes' => array(
                    'id'    => 'password',
                    'placeholder'  => 'Mot de passe',
                    'class' => 'form-control'
                ),
                'options' => array(
                    'label' => 'Mot de passe',   // Label à l'élément
                ),
            ));
        
        
            
            // Le bouton Submit
            $this->add(array(
                'name' => 'submit',        // Nom du champ
                'type' => 'button',        // Type du champ
                'attributes' => array(     // On va définir quelques attributs
                    'value' => 'Se connecter',  // comme la valeur
                    'id' => 'submit',
                    'class' => 'btn btn-success'      // et l'id
                ),
            ));
                        $this->add(array(
                'name' => 'submit2',        // Nom du champ
                'type' => 'button',        // Type du champ
                'attributes' => array(     // On va définir quelques attributs
                    'value' => 'Créer un compte',  // comme la valeur
                    'id' => 'submit',
                    'class' => 'btn btn-success'
                ),
            ));
        }
    }