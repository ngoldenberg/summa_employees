<?php

namespace Summa\EmployeesBundle\Repository;

use Doctrine\ORM\EntityRepository;

class CompanyRepository extends EntityRepository
{
    public function findAgeAvg($id){
        return $this->getEntityManager()->getRepository('EmployeesBundle:Employee')->createQueryBuilder('e')
            ->where('e.companyId = :companyId')
            ->andWhere('e.active = true')
            ->setParameter('companyId', $id)
            ->select('AVG(e.age)')
            ->getQuery()->getSingleScalarResult();
//
//        $lastCertificate = $this->->createQueryBuilder();
//        $lastCertificate->select('c')
//            ->from('AomApiBundle:Certificate', 'c')
//            ->where($lastCertificate->expr()->eq('c.certificateNumber', '('.$highestNumber.')'))
//            ->andWhere('c.agreementId IN(:aIds)')
//            ->andWhere('c.emissionAt >= :fromYear')
//            ->andWhere('c.emissionAt < :toYear')
//            ->andWhere('c.entityId = :entityId')
//            ->orderBy('c.orderNumber', 'DESC')
//            ->setParameter('aIds', $aIds)
//            ->setParameter('fromYear', $fromYear)
//            ->setParameter('toYear', $toYear)
//            ->setParameter('entityId', $entityId)
//            ->setMaxResults(1);
//        $lastCertificate = $lastCertificate->getQuery()->getResult();
    }
}