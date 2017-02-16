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
            $dataForm = array_merge_recursive(
                    $requestpost->getPost()->toArray(), $requestpost->getFiles()->toArray()
            );
            foreach ($dataForm['ingredients'] as $ingredientId) {
                $ingredients[] = $this->service->getRepository('\Pizza\Entity\TbIngredients')->find($ingredientId);
            }

            if ($dataForm['pizofday'] == 1) {
                $pizofday = $this->service->getRepository('\Pizza\Entity\TbPizzaPatron')->pizofday();

                foreach ($pizofday as $pizza) {
                    $pizza->setPizofday("0");
                    $this->service->persist($pizza);
                    $this->service->flush();
                }
            }
        }
        $file = $this->params()->fromFiles('fileupload');

        $base = $this->service->getRepository('\Pizza\Entity\TbBases')->find($dataForm['base']);
        $pizzaToEdit = $this->service->getRepository('Pizza\Entity\TbPizzaPatron')->findOneBy(array('id' => $dataForm['id']));
        $pizzaToEdit->setIngredients($ingredients);
        $pizzaToEdit->setBase($base);
        $pizzaToEdit->setNom($dataForm['nom']);
        $pizzaToEdit->setPizofday($dataForm['pizofday']);
        $pizzaToEdit->setPizza_au_menu($dataForm['pizza_au_menu']);
        $pizzaToEdit->setPrix($dataForm['prix']);

        $adapter = new \Zend\File\Transfer\Adapter\Http();
        $adapter->addValidator('Size', false, array('min' => '10kB', 'max' => '2MB'));
        $adapter->addValidator('Extension', false, 'jpg,png,gif');

        if (!$adapter->isValid()) {

            $dataError = $adapter->getMessages();
            $error = array();
            foreach ($dataError as $key => $row) {
                $error[] = $row;
            }
            $pizzaToEdit = $this->service->getRepository('Pizza\Entity\TbPizzaPatron')->findOneBy(array('id' => $dataForm['id']));
            $pizzaForm = new FormAddPizza($this->service, $pizzaToEdit);
            $pizzaForm->setMessages(array('fileupload' => $error));
            $viewData['form'] = $pizzaForm;
            $viewData['urlimage'] = $pizzaToEdit->getUrl_img();
            return new ViewModel($viewData);
        } else {
            $tmp_name = $pizzaToEdit->getUrl_img();
            $imgpath = ROOT_PATH . 'public/img/img_pizzas/';
            $file_name = $imgpath . $tmp_name;
            $adapter->addFilter('Rename', array('target' => $file_name,
                'overwrite' => true));
            $rtn['success'] = $adapter->receive();
            if ($adapter->receive()) {


                $pizzaToEdit->setUrl_img($tmp_name);
            }
            $this->service->persist($pizzaToEdit);
            $this->service->flush();
            return $this->redirect()->toRoute('zfcadmin/adminpizza');
        }
    }

    public function indexAction() {
        $viewData = array();
        $newpizza = new \Pizza\Entity\TbPizzaPatron();

        $form = new FormAddPizza($this->service, $newpizza);

        if ($this->getRequest()->isPost()) {


            $dataForm = array_merge_recursive(
                    $this->getRequest()->getPost()->toArray(), $this->getRequest()->getFiles()->toArray()
            );
            foreach ($dataForm['ingredients'] as $ingredientId) {
                $ingredients[] = $this->service->getRepository('\Pizza\Entity\TbIngredients')->find($ingredientId);
            }

            if ($dataForm['pizofday'] == 1) {
                $pizofday = $this->service->getRepository('\Pizza\Entity\TbPizzaPatron')->pizofday();

                foreach ($pizofday as $pizza) {
                    $pizza->setPizofday("0");
                    $this->service->persist($pizza);
                    $this->service->flush();
                }
            }
            $file = $this->params()->fromFiles('fileupload');
            $base = $this->service->getRepository('\Pizza\Entity\TbBases')->find($dataForm['base']);
            $newpizza->setIngredients($ingredients);
            $newpizza->setBase($base);
            $newpizza->setNom($dataForm['nom']);
            $newpizza->setPizofday($dataForm['pizofday']);
            $newpizza->setPizza_au_menu($dataForm['pizza_au_menu']);
            $newpizza->setPrix($dataForm['prix']);

            $adapter = new \Zend\File\Transfer\Adapter\Http();
            $adapter->addValidator('Size', false, array('min' => '10kB', 'max' => '2MB'));
            $adapter->addValidator('Extension', false, 'jpg,png,gif');

            if (!$adapter->isValid()) {

                $dataError = $adapter->getMessages();
                $error = array();
                foreach ($dataError as $key => $row) {
                    $error[] = $row;
                }
                $form->setMessages(array('fileupload' => $error));
            } else {

                $adapter->setDestination(ROOT_PATH . 'public/img/img_pizzas');
                $rtn['success'] = $adapter->receive();
                var_dump($rtn['success']);
                if ($adapter->receive()) {

                    $tmp_name = str_replace("/tmp/", "", $file['tmp_name']);
                    $newpizza->setUrl_img($tmp_name . "_" . $file['name']);
                }

                $this->service->persist($newpizza);
                $this->service->flush();
            }
        }
        $viewData['form'] = $form;
        return new ViewModel($viewData);
    }

}
