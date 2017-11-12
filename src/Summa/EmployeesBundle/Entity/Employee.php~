<?php

namespace Summa\EmployeesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use Summa\EmployeesBundle\Entity\Company;


///**
// * @ORM\Table("employees")
// * @ORM\Entity
// */
/**
 * @ORM\Entity
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\DiscriminatorMap({"designer" = "Designer", "developer" = "Developer"})
 */
abstract class Employee
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $surname;

    /**
     * @ORM\Column(type="integer")
     */
    private $age;

    /**
     * @ORM\Column(type="integer")
     * @JMS\SerializedName("companyId")
     * @JMS\Groups({"ids"})
     */
    private $companyId;

    /**
     * @ORM\ManyToOne(targetEntity="Company", inversedBy="employees")
     * @ORM\JoinColumn(name="company_id", referencedColumnName="id")
     * @JMS\Groups({"company"})
     */
    private $company;

    /**
     * @ORM\Column(type="boolean")
     */
    private $active = true;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Employee
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set surname
     *
     * @param string $surname
     *
     * @return Employee
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get surname
     *
     * @return string
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Set age
     *
     * @param integer $age
     *
     * @return Employee
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get age
     *
     * @return integer
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set typeId
     *
     * @param integer $typeId
     *
     * @return Employee
     */
    public function setTypeId($typeId)
    {
        $this->typeId = $typeId;

        return $this;
    }

    /**
     * Get typeId
     *
     * @return integer
     */
    public function getTypeId()
    {
        return $this->typeId;
    }

    /**
     * Set companyId
     *
     * @param integer $companyId
     *
     * @return Employee
     */
    public function setCompanyId($companyId)
    {
        $this->companyId = $companyId;

        return $this;
    }

    /**
     * Get companyId
     *
     * @return integer
     */
    public function getCompanyId()
    {
        return $this->companyId;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return Employee
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set type
     *
     * @param \Summa\EmployeesBundle\Entity\EmployeeType $type
     *
     * @return Employee
     */
    public function setType(\Summa\EmployeesBundle\Entity\EmployeeType $type = null)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return \Summa\EmployeesBundle\Entity\EmployeeType
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set company
     *
     * @param \Summa\EmployeesBundle\Entity\Company $company
     *
     * @return Employee
     */
    public function setCompany(\Summa\EmployeesBundle\Entity\Company $company = null)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return \Summa\EmployeesBundle\Entity\Company
     */
    public function getCompany()
    {
        return $this->company;
    }
}
