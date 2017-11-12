<?php

namespace Summa\EmployeesBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Routing\ClassResourceInterface;
use FOS\RestBundle\Context\Context;
use Symfony\Component\HttpKernel\Exception\HttpException;

class EmployeeController extends FOSRestController implements ClassResourceInterface{

    public function getAction($id){
        $employee = $this->getDoctrine()->getRepository('EmployeesBundle:Employee')->findOneBy([
            'id' => $id,
            'active' => true
        ]);
        if(is_null($employee)){
            throw new HttpException(404, "Employee $id not found.");
        }

        $view = $this->getView($employee, ['Default']);
        return $this->handleView($view);
    }

    public function postAction($id){
        $companiesServices = $this->get('employees.companies_service');
        $employee = $companiesServices->addEmployee($id);

        $view = $this->getView($employee, ['Default', 'company']);
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

