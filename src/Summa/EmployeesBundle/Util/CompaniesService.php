<?php

namespace Summa\EmployeesBundle\Util;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Routing\ClassResourceInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Doctrine\ORM\EntityManager;

use Summa\EmployeesBundle\Entity\Company;

class CompaniesService extends FOSRestController implements ClassResourceInterface {

    private $em;
    private $requestStack;

    public function __construct(EntityManager $em, RequestStack $requestStack){
        $this->em = $em;
        $this->requestStack = $requestStack;
    }


    public function create(){
        $request = $this->requestStack->getCurrentRequest();

        $company = new Company();
        if($request->request->has('businessName')){
            $businessName = $request->request->get('businessName');
            $company->setbusinessName($businessName);
        } else {
            throw new HttpException(422, "BusinessName is missing.");
        }

        $this->em->persist($company);
        $this->em->flush();

        return $company;
    }

}