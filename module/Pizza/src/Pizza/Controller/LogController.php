<?php

namespace Pizza\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Pizza\Service\ControllerServiceInterface;
use Pizza\Form\LogForm;

class LogController extends AbstractActionController {

    protected $service;

    public function __construct(ControllerServiceInterface $service) {
        $this->service = $service->getService();
    }

    public function connectAction() {
        if ($this->getRequest()->isPost()) {
            $dataForm = $this->getRequest()->getPost();

            $request = $this->service->getRepository('Pizza\Entity\TbUsers')->findOneBy(array('email' => $dataForm['email'], 'password' => $dataForm['password']));
            if ($request) {
                $_SESSION['userId'] = $request->getUserId();
                $_SESSION['email'] = $request->getEmail();
                $_SESSION['role'] = $request->getRole();
                return $this->redirect()->toRoute('index');
            }
        }

        $form = new LogForm($this->service);
        $viewData['form'] = $form;
        return new ViewModel($viewData);
    }

    public function adduserAction() {
        
        if ($this->getRequest()->isPost()) {
            $newuser = new \Pizza\Entity\TbUsers();
            $dataForm = $this->getRequest()->getPost();
            
            $userexist = $this->service->getRepository('Pizza\Entity\TbUsers')->findOneBy(array('email' => $dataForm['email']));
            
            if (count($userexist) == 0) {
            
            $ville = $this->service->getRepository('\Pizza\Entity\TbVilles')->find($dataForm['ville']);
            
            $newuser->setVille($ville);
            $newuser->setEmail($dataForm['email']);
            $newuser->setPassword($dataForm['password']);
            $newuser->setPrenom($dataForm['prenom']);
            $newuser->setNumrue($dataForm['numrue']);
            $newuser->setNom($dataForm['nom']);
            $newuser->setRole("user");
            
            $this->service->persist($newuser);
            $this->service->flush();

            $request = $this->service->getRepository('Pizza\Entity\TbUsers')->findOneBy(array('email' => $dataForm['email']));

                $_SESSION['userId'] = $request->getUserId();
                $_SESSION['email'] = $request->getEmail();
                $_SESSION['role'] = $request->getRole();
                return $this->redirect()->toRoute('index');
            }
            
            
 
        }
        
        elseif (isset($_SESSION['userId'])) { return $this->redirect()->toRoute('userdetail'); } else {
       $form = new LogForm($this->service);
        $viewData['form'] = $form;
        return new ViewModel($viewData);
            }

       
    }

}
