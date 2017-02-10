<?php
    namespace Pizza\Form;
    use Zend\Form\Form;
    

    

    // Notre class CategoryForm étend l'élément \Zend\Form\Form; 
    class Editlocalisation extends Form
    {
        public function __construct($set)
        {   
          

            parent::__construct('Editlocalisation');
      

            $this->setAttribute('method', 'post');
            $this->add(array(
                'name' => 'id_membre', // Nom du champ
                'type' => 'Hidden',      // Type du champ
            ));
            

            // Le champs name, de type Text
            $this->add(array(
                'name' => 'adresse',       // Nom du champ
                'type' => 'Text',       // Type du champ
                'attributes' => array(
                    'value' => $set->getAdresse(),
                    'id'    => 'adresse'   // Id du champ
                ),
                'options' => array(
                    'label' => 'Adresse',   // Label à l'élément
                ),
            ));

            $this->add(array(
                'name' => 'email',       // Nom du champ
                'type' => 'Text',       // Type du champ
                'attributes' => array(
                    'value' => $set->getEmail(),
                    'id'    => 'email'   // Id du champ
                ),
                'options' => array(
                    'label' => 'Email',   // Label à l'élément
                ),
            ));
                $this->add(array(
                'name' => 'numero_tel',       // Nom du champ
                'type' => 'Text',       // Type du champ
                'attributes' => array(
                    'value' => $set->getNumero_tel(),
                    'id'    => 'numero_tel'   // Id du champ
                ),
                'options' => array(
                    'label' => 'Numéro de téléphone',   // Label à l'élément
                ),
            ));
                

//                 $this->add(array(
//                'name' => 'map',       // Nom du champ
//                'type' => 'Text',       // Type du champ
//                'attributes' => array(
//                    'id'    => 'map'   // Id du champ
//                ),
//                'options' => array(
//                    'label' => 'map',   // Label à l'élément
//                ),
//            ));
        

        

            

            // Le bouton Submit
            $this->add(array(
                'name' => 'submit',        // Nom du champ
                'type' => 'Submit',        // Type du champ
                'attributes' => array(     // On va définir quelques attributs
                    'value' => 'Modifier',  // comme la valeur
                    'id' => 'submit',      // et l'id
                ),
            ));
        }
    }