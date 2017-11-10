<?php

namespace Summa\EmployeesBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Routing\ClassResourceInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpKernel\Exception\HttpException;

use Summa\EmployeesBundle\Entity\Company;

class CompanyController extends FOSRestController implements ClassResourceInterface{

    public function cgetAction(){
        $companies = $this->getDoctrine()->getRepository('EmployeesBundle:Company')->findBy([
            'active' => true
        ]);
        $view = $this->view($companies);
        return $this->handleView($view);
    }

    public function getAction($id){
        $company = $this->getDoctrine()->getRepository('EmployeesBundle:Company')->findOneBy([
            'id' => $id,
            'active' => true
        ]);
        if(is_null($company)){
            throw new HttpException(404, "Company $id not found.");
        }

        $view = $this->view($company);
        return $this->handleView($view);
    }

    public function postAction(){
        $companiesServices = $this->get('employees.companies_service');
        $company = $companiesServices->create();

        $view = $this->view($company);
        return $this->handleView($view);
    }
}

