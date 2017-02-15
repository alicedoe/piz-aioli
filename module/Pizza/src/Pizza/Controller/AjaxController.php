<?php

namespace Pizza\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Pizza\Service\ControllerServiceInterface;
use Zend\View\Model\JsonModel;

class AjaxController extends AbstractActionController {

    protected $service;
    protected $listeBase;

    public function __construct(ControllerServiceInterface $service) {
        $this->service = $service->getService();
    }

    public function addtocartAction() {


        $id = (int) $this->params()->fromRoute('id', 0);

        if (!isset($_SESSION['panier']['pizza'])) {
            $_SESSION['panier']['pizza'] = array();
            $_SESSION['panier']['pizza'][] = $id;
            return new JsonModel(array(
                'cartnb' => count($_SESSION['panier']['pizza']),
                'success' => true,
            ));
        } else {
            $_SESSION['panier']['pizza'][] = $id;
            return new JsonModel(array(
                'cartnb' => count($_SESSION['panier']['pizza']),
                'success' => true,
            ));
        }
    }
    
    public function emptycartAction() {

        if (isset($_SESSION['panier']['pizza'])) {
            unset($_SESSION['panier']['pizza']);
            return new JsonModel(array(
                'cartnb' => count($_SESSION['panier']['pizza']),
                'success' => true,
            ));

            return $emptycart;
        } else {
            return new JsonModel(array(
                'cartnb' => 0,
                'success' => true,
            ));

            return $emptycart;
        }
    }

    public function deletepizzaAction() {
        $id = (int) $this->params()->fromRoute('id', 0);
        $pizzatodelete = $this->service->getRepository('Pizza\Entity\TbPizzaPatron')->find($id);
        $this->service->remove($pizzatodelete);
        $this->service->flush();

        return new JsonModel(array(
            'cartnb' => $id,
            'success' => true,
        ));
    }
    
    public function setpizofdayAction() {
        $id = (int) $this->params()->fromRoute('id', 0);
        $removepizofday = $this->service->getRepository('Pizza\Entity\TbPizzaPatron')->findOneBy(array('pizofday' => 1));
        $removepizofday->setPizofday(0);
        $this->service->persist($removepizofday);
        $this->service->flush();
        $setpizofday = $this->service->getRepository('Pizza\Entity\TbPizzaPatron')->findOneBy(array('id' => $id));
        $setpizofday->setPizofday(1);
        $this->service->persist($setpizofday);
        $this->service->flush();

        return new JsonModel(array(
            'success' => true,
            'id' => $id
        ));
    }

    public function listcartAction() {
        if (!isset($_SESSION['panier']['pizza'])) {
            return new JsonModel(array(
                'listcart' => "vide",
                'success' => true,
            ));
            return $listcart;
        } else {

            foreach ($_SESSION['panier']['pizza'] as $pizza) {
                $pizzaencours = $this->service->getRepository('Pizza\Entity\TbPizzaPatron')->find($pizza);
                $nom = $pizzaencours->getNom();
                $prix = $pizzaencours->getPrix();
                $listepizzas[] = [$nom];
            }
            return new JsonModel($listepizzas);
        }
    }

}
