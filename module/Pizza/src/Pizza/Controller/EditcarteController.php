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

        return new ViewModel(array(
            'listepizza_page' => $this->service->getRepository('Pizza\Entity\TbPizzaPatron')->cartepizzas(),
        ));
    }
    public function indexAction() {
        $viewData = array();

        $form = new FormAddPizza($this->service);

        if ($this->getRequest()->isPost()) {
            $newpizza = new \Pizza\Entity\TbPizzaPatron();
            
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
                $adapter->setDestination(ROOT_PATH.'/public/img/img_pizzas');
                echo ROOT_PATH;

                if ($adapter->receive($File['name'])) {
                    
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
