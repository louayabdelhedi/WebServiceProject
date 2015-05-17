<?php

namespace WebService\WebServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Field
 *
 * @ORM\Table(name="field")
 * @ORM\Entity
 */
class Field
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nameField", type="string", length=255)
     */
    private $nameField;

    /**
     * @var string
     *
     * @ORM\Column(name="typeField", type="string", length=255)
     */
    private $typeField;


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
     * Set nameField
     *
     * @param string $nameField
     * @return Field
     */
    public function setNameField($nameField)
    {
        $this->nameField = $nameField;

        return $this;
    }

    /**
     * Get nameField
     *
     * @return string 
     */
    public function getNameField()
    {
        return $this->nameField;
    }

    /**
     * Set typeField
     *
     * @param string $typeField
     * @return Field
     */
    public function setTypeField($typeField)
    {
        $this->typeField = $typeField;

        return $this;
    }

    /**
     * Get typeField
     *
     * @return string 
     */
    public function getTypeField()
    {
        return $this->typeField;
    }
}
