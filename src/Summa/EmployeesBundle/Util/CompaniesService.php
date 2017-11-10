<?php

namespace Summa\EmployeesBundle\Util;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Routing\ClassResourceInterface;
use Summa\EmployeesBundle\EmployeesBundle;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Doctrine\ORM\EntityManager;

class CompaniesService extends FOSRestController implements ClassResourceInterface {

    private $em;
    private $requestStack;

    public function __construct(EntityManager $em, RequestStack $requestStack){
        $this->em = $em;
        $this->requestStack = $requestStack;
    }


    public function create(){
        return "works";
    }


}