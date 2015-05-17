<?php

namespace WebService\WebServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Model
 *
 * @ORM\Table(name="model")
 * @ORM\Entity
 */
class Model
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
     * @ORM\Column(name="nameModel", type="string", length=255)
     */
    private $nameModel;

    /**
     * @var string
     *
     * @ORM\Column(name="descModel", type="string", length=255)
     */
    private $descModel;


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
     * Set nameModel
     *
     * @param string $nameModel
     * @return Model
     */
    public function setNameModel($nameModel)
    {
        $this->nameModel = $nameModel;

        return $this;
    }

    /**
     * Get nameModel
     *
     * @return string 
     */
    public function getNameModel()
    {
        return $this->nameModel;
    }

    /**
     * Set descModel
     *
     * @param string $descModel
     * @return Model
     */
    public function setDescModel($descModel)
    {
        $this->descModel = $descModel;

        return $this;
    }

    /**
     * Get descModel
     *
     * @return string 
     */
    public function getDescModel()
    {
        return $this->descModel;
    }
}
