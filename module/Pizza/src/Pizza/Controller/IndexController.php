<?php

namespace Pizza\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Pizza\Service\ControllerServiceInterface;

class IndexController extends AbstractActionController {

    protected $service;
    protected $listeBase;

    public function __construct(ControllerServiceInterface $service) {
        $this->service = $service->getService();
    }
    
    

    public function pizofdayAction() {
        $pizzadujour = $this->service->getRepository('Pizza\Entity\TbPizzaPatron')->pizofday();

        return new ViewModel(array(
            'listepizza_page' => $pizzadujour
        ));
    }

    public function cartepizzasAction() {

        return new ViewModel(array(
            'listepizza_page' => $this->service->getRepository('Pizza\Entity\TbPizzaPatron')->cartepizzas(),
        ));
    }
    
    public function disconnectAction() {
     if (isset($_SESSION['email'])) { unset($_SESSION); session_destroy();
     }

     return $this->redirect()->toRoute('index');
}
public function localisationAction() {
        
        return new ViewModel(array(
            'localisation' =>  $this->service->getRepository('Pizza\Entity\TbInfosSociete')->findlocalisation(),
        ));
     }

}
