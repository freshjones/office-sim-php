<?php

//namespace OfficeServices;
//use Singleton\Singleton as Singleton;


class Office
{
    private $services;

    public function __construct()
    {
    }

    public function addService($service)
    {
        $this->services[] = $service;
    }

    public function getServices()
    {
        return $this->services;
    }
    
    public function runServices()
    {

        $services = $this->getServices();

        foreach($services AS $service)
        {
            $service->runDepartmentServices();
        }

    }
}