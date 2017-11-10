<?php

namespace Summa\EmployeesBundle\Util;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Routing\ClassResourceInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Doctrine\ORM\EntityManager;

use Summa\EmployeesBundle\Entity\Company;
use Summa\EmployeesBundle\Entity\Designer;
use Summa\EmployeesBundle\Entity\Developer;

class CompaniesService extends FOSRestController implements ClassResourceInterface {

    private $em;
    private $requestStack;

    public function __construct(EntityManager $em, RequestStack $requestStack){
        $this->em = $em;
        $this->requestStack = $requestStack;
    }

    public function addDesigner($id){
        $request = $this->requestStack->getCurrentRequest();

        $company = $this->em->getRepository('EmployeesBundle:Company')->findOneBy([
            'id' => $id,
            'active' => true
        ]);
        if(is_null($company)){
            throw new HttpException(404, "Company $id not found.");
        }

        if($request->request->has('name')){
            $name = $request->request->get('name');
        } else {
            throw new HttpException(422, "Name is missing.");
        }

        if($request->request->has('surname')){
            $surname = $request->request->get('surname');
        } else {
            throw new HttpException(422, "Surname is missing.");
        }

        if($request->request->has('age')){
            $age = $request->request->get('age');
        } else {
            throw new HttpException(422, "Age is missing.");
        }

        if($request->request->has('graphicDesigner')){
            $graphicDesigner = $request->request->get('graphicDesigner');
        } else {
            throw new HttpException(422, "GraphicDesigner is missing.");
        }

        $designer = $this->createDesigner($name, $surname, $age, $graphicDesigner, $company);

        return $designer;
    }

    private function createDesigner($name, $surname, $age, $graphicDesigner, Company $company, $flush = true){
        $designer = new Designer();
        $designer->setName($name);
        $designer->setSurname($surname);
        $designer->setAge($age);
        $designer->setGraphicDesigner($graphicDesigner);
        $designer->setCompany($company);
        $this->em->persist($designer);
        if($flush){
            $this->em->flush();
        }
        return $designer;
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