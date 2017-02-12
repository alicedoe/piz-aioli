<?php

namespace Pizza\Factory;
 
use Pizza\Controller\MembreController;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
 
use Pizza\Service\ControllerService;
 
class MembreControllerFactory implements FactoryInterface
{
    /**
    * Create service
    *
    * @param ServiceLocatorInterface $sl
    *
    * @return Pizza\Controller\MembreController
    */
    public function createService(ServiceLocatorInterface $sl)
    {
        $cs = new ControllerService($sl->getServiceLocator()->get('doctrine.entitymanager.orm_default'));
        return new MembreController($cs);
    }
}