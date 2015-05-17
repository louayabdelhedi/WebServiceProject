<?php

namespace WebService\WebServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * WebService
 *
 * @ORM\Table(name="webservice")
 * @ORM\Entity
 */
class WebService
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
     * @ORM\Column(name="nameWS", type="string", length=255)
     */
    private $nameWS;

    /**
     * @var string
     *
     * @ORM\Column(name="linkWS", type="string", length=255)
     */
    private $linkWS;


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
     * Set nameWS
     *
     * @param string $nameWS
     * @return WebService
     */
    public function setNameWS($nameWS)
    {
        $this->nameWS = $nameWS;

        return $this;
    }

    /**
     * Get nameWS
     *
     * @return string 
     */
    public function getNameWS()
    {
        return $this->nameWS;
    }

    /**
     * Set linkWS
     *
     * @param string $linkWS
     * @return WebService
     */
    public function setLinkWS($linkWS)
    {
        $this->linkWS = $linkWS;

        return $this;
    }

    /**
     * Get linkWS
     *
     * @return string 
     */
    public function getLinkWS()
    {
        return $this->linkWS;
    }
}
