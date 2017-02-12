<?php

namespace Pizza\Factory;
 
use Pizza\Controller\LogController;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
 
use Pizza\Service\ControllerService;
 
class LogControllerFactory implements FactoryInterface
{
    /**
    * Create service
    *
    * @param ServiceLocatorInterface $sl
    *
    * @return Pizza\Controller\LogController
    */
    public function createService(ServiceLocatorInterface $sl)
    {
        $cs = new ControllerService($sl->getServiceLocator()->get('doctrine.entitymanager.orm_default'));
        return new LogController($cs);
    }
}