<?php

namespace Summa\EmployeesBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Routing\ClassResourceInterface;
use FOS\RestBundle\Context\Context;
use Symfony\Component\HttpKernel\Exception\HttpException;

class CompanyController extends FOSRestController implements ClassResourceInterface{

    public function cgetAction(){
        $companies = $this->getDoctrine()->getRepository('EmployeesBundle:Company')->findBy([
            'active' => true
        ]);
        $view = $this->view($companies);
        $context = new Context();
        $context->setGroups(['Default', 'employees']);
        $view->setContext($context);
        $view->getContext()->enableMaxDepth();
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
        $context = new Context();
        $context->setGroups(['Default', 'employees']);
        $view->setContext($context);
        $view->getContext()->enableMaxDepth();
        return $this->handleView($view);
    }

    public function getAverageAction($id){
        $companiesServices = $this->get('employees.companies_service');
        $averageAge = $companiesServices->getAverageAge($id);

        $view = $this->view([ "averageAge" => $averageAge]);
        $context = new Context();
        $context->setGroups(['Default', 'employees']);
        $view->setContext($context);
        $view->getContext()->enableMaxDepth();
        return $this->handleView($view);
    }


    public function getEmployeesAction($id){
        $companiesServices = $this->get('employees.companies_service');
        $employees = $companiesServices->getEmployees($id);

        $view = $this->view($employees);
        $context = new Context();
        $context->setGroups(['Default']);
        $view->setContext($context);
        $view->getContext()->enableMaxDepth();
        return $this->handleView($view);
    }


    public function postAction(){
        $companiesServices = $this->get('employees.companies_service');
        $company = $companiesServices->create();

        $view = $this->view($company);
        return $this->handleView($view);
    }
}

