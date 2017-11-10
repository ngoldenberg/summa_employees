<?php

namespace Summa\EmployeesBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Routing\ClassResourceInterface;
use FOS\RestBundle\Context\Context;

class EmployeeController extends FOSRestController implements ClassResourceInterface{

    public function postDesignerAction($id){
        $companiesServices = $this->get('employees.companies_service');
        $employee = $companiesServices->addDesigner($id);

        $view = $this->view($employee);
        $context = new Context();
        $context->setGroups(['Default']);
        $view->setContext($context);
        $view->getContext()->enableMaxDepth();
        return $this->handleView($view);
    }

    public function postDeveloperAction($id){
        $companiesServices = $this->get('employees.companies_service');
        $employee = $companiesServices->addDeveloper($id);

        $view = $this->view($employee);
        $context = new Context();
        $context->setGroups(['Default']);
        $view->setContext($context);
        $view->getContext()->enableMaxDepth();
        return $this->handleView($view);
    }

}

