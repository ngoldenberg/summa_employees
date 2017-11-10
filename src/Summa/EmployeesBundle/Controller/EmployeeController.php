<?php

namespace Summa\EmployeesBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Routing\ClassResourceInterface;
use FOS\RestBundle\Context\Context;
use Symfony\Component\HttpKernel\Exception\HttpException;

class EmployeeController extends FOSRestController implements ClassResourceInterface{

    public function getDesignerAction($id){
        $company = $this->getDoctrine()->getRepository('EmployeesBundle:Designer')->findOneBy([
            'id' => $id,
            'active' => true
        ]);
        if(is_null($company)){
            throw new HttpException(404, "Designer $id not found.");
        }

        $view = $this->view($company);
        $context = new Context();
        $context->setGroups(['Default']);
        $view->setContext($context);
        $view->getContext()->enableMaxDepth();
        return $this->handleView($view);
    }

    public function getDeveloperAction($id){
        $company = $this->getDoctrine()->getRepository('EmployeesBundle:Developer')->findOneBy([
            'id' => $id,
            'active' => true
        ]);
        if(is_null($company)){
            throw new HttpException(404, "Developer $id not found.");
        }

        $view = $this->view($company);
        $context = new Context();
        $context->setGroups(['Default']);
        $view->setContext($context);
        $view->getContext()->enableMaxDepth();
        return $this->handleView($view);
    }

    public function postDesignerAction($id){
        $companiesServices = $this->get('employees.companies_service');
        $employee = $companiesServices->addDesigner($id);

        $view = $this->view($employee);
        $context = new Context();
        $context->setGroups(['Default', 'company']);
        $view->setContext($context);
        $view->getContext()->enableMaxDepth();
        return $this->handleView($view);
    }

    public function postDeveloperSortOrderAction($id){
        $companiesServices = $this->get('employees.companies_service');
        $employee = $companiesServices->addDeveloper($id);

        $view = $this->view($employee);
        $context = new Context();
        $context->setGroups(['Default', 'company']);
        $view->setContext($context);
        $view->getContext()->enableMaxDepth();
        return $this->handleView($view);
    }

}

