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
                $_SESSION['userId'] = $request->getUser_id();
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
            echo"toto";
            $newuser = new \Pizza\Entity\TbUsers();
            $dataForm = $this->getRequest()->getPost();

            $newuser->setEmail($dataForm['email']);
            $newuser->setPassword($dataForm['password']);
            $newuser->setRole("user");
            $this->service->persist($newuser);
            $this->service->flush();

            $request = $this->service->getRepository('Pizza\Entity\TbUsers')->findOneBy(array('email' => $dataForm['email']));
print_r($request);
                $_SESSION['userId'] = $request->getUser_id();
                $_SESSION['email'] = $request->getEmail();
                $_SESSION['role'] = $request->getRole();
                return $this->redirect()->toRoute('index');
 
        }

        $form = new LogForm($this->service);
        $viewData['form'] = $form;
        return new ViewModel($viewData);
    }

}
