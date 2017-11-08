<?php

namespace Summa\EmployeesBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Routing\ClassResourceInterface;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;


class CompanyController extends FOSRestController implements ClassResourceInterface{

    public function cgetAction(){
//        $em = $this->getDoctrine()->getManager();
//        $paginationToolsService = $this->get('aom_api.pagination_tools_service');
//
//        $queryBuilder = $em->createQueryBuilder()
//            ->select('c')
//            ->from('AomApiBundle:Country', 'c');
//        $query = $queryBuilder->getQuery();
//        $result = $query->getResult();
        $view = $this->view([
            "status" => "ok",
            "res" => "420 qasadasd"
        ]);
        return $this->handleView($view);
    }
}

