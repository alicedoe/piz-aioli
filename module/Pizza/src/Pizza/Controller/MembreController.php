<?php

namespace Pizza\Controller;

use Pizza\Form\UserForm;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Pizza\Service\ControllerServiceInterface;

class MembreController extends AbstractActionController {
    
    protected $service;
    
    public function __construct(ControllerServiceInterface $service) {
        $this->service = $service->getService();
    }

    public function detailAction() {
         $id = $_SESSION['userId'];
        return new ViewModel(
                array(
            'detail' => $this->service->getRepository('Pizza\Entity\TbUsers')->find($id),
        ));
    }

    public function settingAction() {
        
if ($this->getRequest()->isPost()) {
                $ajout = new \Forum\Entity\Membre();
                $dataForm = $this->getRequest()->getPost();
                $ajout->setNom($dataForm['nom']);
                $this->service->persist($ajout);
            }


        $id = (int) $this->params()->fromRoute('id', 0);
        $set = $this->service->getRepository('Pizza\Entity\TbUsers')->find($id);
        $viewData['set'] = $set;
        $form = new UserForm($this->service, $set);
        $viewData['form'] = $form;
        return new ViewModel($viewData);
    }

}