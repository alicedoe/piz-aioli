<?php

namespace Pizza\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Pizza\Form\Editlocalisation;
use Pizza\Service\ControllerServiceInterface;

class AdmincommandesController extends AbstractActionController {

    protected $service;

    public function __construct(ControllerServiceInterface $service) {
        $this->service = $service->getService();
    }
    
        public function editlocalisationAction() {
            
if ($this->getRequest()->isPost()) {
            $dataForm = $this->getRequest()->getPost();
            $set = $this->service->getRepository('Pizza\Entity\TbInfosSociete')->find(1);
                $set->setAdresse($dataForm['adresse']);
                $set->setNumero_tel($dataForm['numero_tel']);
                $set->setEmail($dataForm['email']);
          $this->service->persist($set);
          $this->service->flush();
          header('Location: /localisation');
                      exit;
        }
        
        
  
        $set = $this->service->getRepository('\Pizza\Entity\TbInfosSociete')->find(1);
        $form = new Editlocalisation($set);
        $viewData['form'] = $form;
        $viewData['set']=$set;
        return new ViewModel($viewData);

    }
    
}