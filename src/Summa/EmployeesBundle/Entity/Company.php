<?php

namespace Summa\EmployeesBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection as Collection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;

/**
 * @ORM\Table("companies")
 * @ORM\Entity(repositoryClass="Summa\EmployeesBundle\Repository\CompanyRepository")
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
     * @JMS\SerializedName("businessName")
     */
    private $businessName;

    /**
     * @ORM\OneToMany(targetEntity="Employee", mappedBy="company", cascade={"persist"})
     * @JMS\Groups({"employees"})
     */
    private $employees;

    /**
     * @ORM\Column(type="boolean")
     */
    private $active = true;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->employees = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set businessName
     *
     * @param string $businessName
     *
     * @return Company
     */
    public function setBusinessName($businessName)
    {
        $this->businessName = $businessName;

        return $this;
    }

    /**
     * Get businessName
     *
     * @return string
     */
    public function getBusinessName()
    {
        return $this->businessName;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return Company
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
     * Add employee
     *
     * @param \Summa\EmployeesBundle\Entity\Employee $employee
     *
     * @return Company
     */
    public function addEmployee(\Summa\EmployeesBundle\Entity\Employee $employee)
    {
        $this->employees[] = $employee;

        return $this;
    }

    /**
     * Remove employee
     *
     * @param \Summa\EmployeesBundle\Entity\Employee $employee
     */
    public function removeEmployee(\Summa\EmployeesBundle\Entity\Employee $employee)
    {
        $this->employees->removeElement($employee);
    }

    /**
     * Get employees
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEmployees()
    {
        return $this->employees;
    }

}
