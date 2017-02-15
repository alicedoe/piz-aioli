<?php

namespace Pizza\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Pizza\Form\FormAddPizza;
use Pizza\Service\ControllerServiceInterface;
use Zend\Validator\File\Size;

class EditcarteController extends AbstractActionController {

    protected $service;
    protected $listeBase;

    public function __construct(ControllerServiceInterface $service) {
        $this->service = $service->getService();
    }
   public function admincartepizzasAction() {

        return new ViewModel(array(
            'listepizza_page' => $this->service->getRepository('Pizza\Entity\TbPizzaPatron')->cartepizzas(),
        ));
    }
    
    public function editpizzaAction() {
        
        $requestpost = $this->getRequest();
        
        if (!$requestpost->isPost()) {
        $id = (int) $this->params()->fromRoute('id', 0);
         $pizzaToEdit = $this->service->getRepository('Pizza\Entity\TbPizzaPatron')->findOneBy(array('id' => $id));
         $pizzaForm = new FormAddPizza($this->service, $pizzaToEdit);
         $viewData['form'] = $pizzaForm;
           $viewData['urlimage'] = $pizzaToEdit->getUrl_img();
        return new ViewModel($viewData);
        }
         
         if ($requestpost->isPost()) {
             
            $data = array_merge_recursive(
                        $requestpost->getPost()->toArray(),
                    $requestpost->getFiles()->toArray()
                   );

            $base = $this->service->getRepository('\Pizza\Entity\TbBases')->find($data['base']);
            foreach ($data['ingredients'] as $ingredientId) {
                $ingredients[] = $this->service->getRepository('\Pizza\Entity\TbIngredients')->find($ingredientId);
            }
            $pizzaToEdit = $this->service->getRepository('Pizza\Entity\TbPizzaPatron')->findOneBy(array('id' => $data['id']));
            $pizzaToEdit->setIngredients($ingredients);
            $pizzaToEdit->setBase($base);
            $pizzaToEdit->setNom($data['nom']);
            $pizzaToEdit->setPizofday($data['pizofday']);
            $pizzaToEdit->setPizza_au_menu($data['pizza_au_menu']);
            $pizzaToEdit->setPrix($data['prix']);
            
           $nomimage = $pizzaToEdit->getUrl_img();
            $file = $this->params()->fromFiles('fileupload');
            
            
            if (count($files['fileupload']) > 0) {
            $size = new Size(array('min' => 2000));
            $adapter = new \Zend\File\Transfer\Adapter\Http();
            //validator can be more than one...
            $adapter->setValidators(array($size), $files['fileupload']['size']);

            if (!$adapter->isValid()) {
             
             echo "toto";
            }
            }
                        
            $this->service->persist($pizzaToEdit);
            $this->service->flush();
            return $this->redirect()->toRoute('zfcadmin/adminpizza');           
            
        }
        
    }
    
    public function indexAction() {
        $viewData = array();
        $newpizza = new \Pizza\Entity\TbPizzaPatron();

        $form = new FormAddPizza($this->service,$newpizza);

        if ($this->getRequest()->isPost()) {
            
            
            $dataForm    = array_merge_recursive(
                        $this->getRequest()->getPost()->toArray(),           
                       $this->getRequest()->getFiles()->toArray()
                   );
            foreach ($dataForm['ingredients'] as $ingredientId) {
                $ingredients[] = $this->service->getRepository('\Pizza\Entity\TbIngredients')->find($ingredientId);
            }
            
            if ($dataForm['pizofday']==1) {
                $pizofday = $this->service->getRepository('\Pizza\Entity\TbPizzaPatron')->pizofday();
                
                foreach ( $pizofday as $pizza ) {
                    $pizza->setPizofday("0");
                    $this->service->persist($pizza);
                    $this->service->flush();
                }
                
            }
            $File    = $this->params()->fromFiles('fileupload');
            $base = $this->service->getRepository('\Pizza\Entity\TbBases')->find($dataForm['base']);
            $newpizza->setIngredients($ingredients);
            $newpizza->setBase($base);
            $newpizza->setNom($dataForm['nom']);
            $newpizza->setPizofday($dataForm['pizofday']);
            $newpizza->setPizza_au_menu($dataForm['pizza_au_menu']);
            $newpizza->setPrix($dataForm['prix']);

            $size = new Size(array('min' => 2000)); //minimum bytes filesize
            $adapter = new \Zend\File\Transfer\Adapter\Http();
            //validator can be more than one...
            $adapter->setValidators(array($size), $File['name']);
            if (!$adapter->isValid()) {

                $dataError = $adapter->getMessages();
                $error = array();
                foreach ($dataError as $key => $row) {
                    $error[] = $row;
                } //set formElementErrors
                $form->setMessages(array('fileupload' => $error));
            } else {                 
           
                $adapter->setDestination(ROOT_PATH.'public/img/img_pizzas');
                
                
                if ($adapter->receive($File['name'])) {
                     var_dump($File);
                    $tmp_name = str_replace("/tmp/", "", $dataForm['fileupload']['tmp_name']);
                    $newpizza->setUrl_img($tmp_name."_".$dataForm['fileupload']['name']);
                }
            }
            $this->service->persist($newpizza);
                    $this->service->flush();
        }
        $viewData['form'] = $form;
        return new ViewModel($viewData);
    }
    

}
