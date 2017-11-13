<?php

namespace Summa\EmployeesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use Summa\EmployeesBundle\Entity\Company;

/**
 * @ORM\Entity
 */
class Developer extends Employee
{
    /**
     * @ORM\Column(type="integer")
     * @JMS\SerializedName("programmingLanguageId")
     * @JMS\Groups({"ids"})
     */
    private $programmingLanguageId;

    /**
     * @ORM\ManyToOne(targetEntity="ProgrammingLanguage")
     * @ORM\JoinColumn(name="programming_language_id", referencedColumnName="id")
     * @JMS\SerializedName("programmingLanguage")
     */
    private $programmingLanguage;


    /**
     * Set programmingLanguageId
     *
     * @param integer $programmingLanguageId
     *
     * @return Developer
     */
    public function setProgrammingLanguageId($programmingLanguageId)
    {
        $this->programmingLanguageId = $programmingLanguageId;

        return $this;
    }

    /**
     * Get programmingLanguageId
     *
     * @return integer
     */
    public function getProgrammingLanguageId()
    {
        return $this->programmingLanguageId;
    }

    /**
     * Set programmingLanguage
     *
     * @param \Summa\EmployeesBundle\Entity\ProgrammingLanguage $programmingLanguage
     *
     * @return Developer
     */
    public function setProgrammingLanguage(\Summa\EmployeesBundle\Entity\ProgrammingLanguage $programmingLanguage = null)
    {
        $this->programmingLanguage = $programmingLanguage;

        return $this;
    }

    /**
     * Get programmingLanguage
     *
     * @return \Summa\EmployeesBundle\Entity\ProgrammingLanguage
     */
    public function getProgrammingLanguage()
    {
        return $this->programmingLanguage;
    }
}
