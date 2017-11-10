<?php

namespace Summa\EmployeesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use Summa\EmployeesBundle\Entity\Company;


/**
 * @ORM\Table("designers")
 * @ORM\Entity
 */
class Designer
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
     * @ORM\Column(type="boolean")
     * @JMS\SerializedName("graphicDesigner")
     */
    private $graphicDesigner;

    /**
     * @ORM\Column(type="integer")
     * @JMS\SerializedName("companyId")
     * @JMS\Groups({"ids"})
     */
    private $companyId;

    /**
     * @ORM\ManyToOne(targetEntity="Company", inversedBy="designers")
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
     * @return Designer
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
     * @return Designer
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
     * @return Designer
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
     * Set graphicDesigner
     *
     * @param boolean $graphicDesigner
     *
     * @return Designer
     */
    public function setGraphicDesigner($graphicDesigner)
    {
        $this->graphicDesigner = $graphicDesigner;

        return $this;
    }

    /**
     * Get graphicDesigner
     *
     * @return boolean
     */
    public function getGraphicDesigner()
    {
        return $this->graphicDesigner;
    }

    /**
     * Set companyId
     *
     * @param integer $companyId
     *
     * @return Designer
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
     * Set company
     *
     * @param \Summa\EmployeesBundle\Entity\Company $company
     *
     * @return Designer
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

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return Designer
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
}
