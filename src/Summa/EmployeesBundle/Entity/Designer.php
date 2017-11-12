<?php

namespace Summa\EmployeesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use Summa\EmployeesBundle\Entity\Company;


/**
 * @ORM\Entity
 */
class Designer extends Employee
{
    /**
     * @ORM\Column(type="boolean")
     * @JMS\SerializedName("graphicDesigner")
     */
    private $graphicDesigner;


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
}
