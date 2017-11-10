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
     * @JMS\SerializedName("businessName")
     */
    private $businessName;

    /**
     * @ORM\OneToMany(targetEntity="Developer", mappedBy="company")
     * @JMS\Groups({"employees"})
     */
    private $developers;

    /**
     * @ORM\OneToMany(targetEntity="Designer", mappedBy="company")
     * @JMS\Groups({"employees"})
     */
    private $designers;

    /**
     * @ORM\Column(type="boolean")
     */
    private $active = true;

    public function __construct() {
        $this->developers = new Collection();
        $this->designers = new Collection();
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
     * Add developer
     *
     * @param \Summa\EmployeesBundle\Entity\Developer $developer
     *
     * @return Company
     */
    public function addDeveloper(\Summa\EmployeesBundle\Entity\Developer $developer)
    {
        $this->developers[] = $developer;

        return $this;
    }

    /**
     * Remove developer
     *
     * @param \Summa\EmployeesBundle\Entity\Developer $developer
     */
    public function removeDeveloper(\Summa\EmployeesBundle\Entity\Developer $developer)
    {
        $this->developers->removeElement($developer);
    }

    /**
     * Get developers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDevelopers()
    {
        return $this->developers;
    }

    /**
     * Add designer
     *
     * @param \Summa\EmployeesBundle\Entity\Designer $designer
     *
     * @return Company
     */
    public function addDesigner(\Summa\EmployeesBundle\Entity\Designer $designer)
    {
        $this->designers[] = $designer;

        return $this;
    }

    /**
     * Remove designer
     *
     * @param \Summa\EmployeesBundle\Entity\Designer $designer
     */
    public function removeDesigner(\Summa\EmployeesBundle\Entity\Designer $designer)
    {
        $this->designers->removeElement($designer);
    }

    /**
     * Get designers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDesigners()
    {
        return $this->designers;
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
}
