<?php

namespace Summa\EmployeesBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Routing\ClassResourceInterface;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;


class CompanyController extends FOSRestController implements ClassResourceInterface{

    public function cgetAction(){

        $companiesService = $this->get('employees.companies_service');

        $res = $companiesService->create();

        $view = $this->view([
            "status" => $res
        ]);
        return $this->handleView($view);
    }
}

