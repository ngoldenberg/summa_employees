<?php

namespace Summa\EmployeesBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection as Collection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;

/**
 * @ORM\Table("companies")
 * @ORM\Entity
 */
class Company
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=250)
     */
    private $businessName;

//    /**
//     * @ORM\OneToMany(targetEntity="Developer", mappedBy="company")
//     */
//    private $developers;
//
//    /**
//     * @ORM\OneToMany(targetEntity="Designer", mappedBy="company")
//     */
//    private $designers;


    public function __construct() {
        $this->developers = new Collection();
        $this->designers = new Collection();
    }

}
