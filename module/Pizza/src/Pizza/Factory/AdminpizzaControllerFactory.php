<?php

namespace Pizza\Factory;
 
use Pizza\Controller\AdminpizzaController;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
 
use Pizza\Service\ControllerService;
 
class AdminpizzaControllerFactory implements FactoryInterface
{
    /**
    * Create service
    *
    * @param ServiceLocatorInterface $sl
    *
    * @return Pizza\Controller\IndexController
    */
    public function createService(ServiceLocatorInterface $sl)
    {
        $cs = new ControllerService($sl->getServiceLocator()->get('doctrine.entitymanager.orm_default'));
        return new AdminpizzaController($cs);
    }
}