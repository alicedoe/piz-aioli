<?php

namespace Pizza\Service;
 
class ControllerService implements ControllerServiceInterface
{
   protected $service;
 
   public function __construct($service) {
       $this->service = $service;
   }
 
   public function getService() {
       return $this->service;
   }
}