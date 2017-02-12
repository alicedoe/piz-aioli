<?php

namespace Pizza\Factory;
 
use Pizza\Controller\EditcarteController;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
 
use Pizza\Service\ControllerService;
 
class EditcarteControllerFactory implements FactoryInterface
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
        return new EditcarteController($cs);
    }
}