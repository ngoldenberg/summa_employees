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

        $view = $this->getView($companies, ['Default', 'employees']);
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
        $view = $this->getView($company, ['Default', 'employees']);
        return $this->handleView($view);
    }

    public function getAverageAction($id){
        $companiesServices = $this->get('employees.companies_service');
        $averageAge = $companiesServices->getAverageAge($id);

        $view = $this->getView(["averageAge" => $averageAge], ['Default', 'employees']);
        return $this->handleView($view);
    }

    public function getEmployeesAction($id){
        $companiesServices = $this->get('employees.companies_service');
        $employees = $companiesServices->getEmployees($id);

        $view = $this->getView($employees, ['Default']);
        return $this->handleView($view);
    }

    public function postAction(){
        $companiesServices = $this->get('employees.companies_service');
        $company = $companiesServices->create();

        $view = $this->getView($company);
        return $this->handleView($view);
    }

    private function getView($data, $groups = [], $enableMaxDepth = true){
        $view = $this->view($data);
        if(count($groups) > 0 || $enableMaxDepth){
            $context = new Context();
            if(count($groups) > 0){
                $context->setGroups($groups);
            }
            $view->setContext($context);
            if($enableMaxDepth){
                $view->getContext()->enableMaxDepth();
            }
        }
        return $view;
    }
}

