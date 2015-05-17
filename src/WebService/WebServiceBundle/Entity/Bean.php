<?php

namespace WebService\WebServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bean
 *
 * @ORM\Table(name="bean")
 * @ORM\Entity
 */
class Bean
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
     * @ORM\Column(name="beanName", type="string", length=255)
     */
    private $beanName;

    /**
     * @var string
     *
     * @ORM\Column(name="beanLink", type="string", length=255)
     */
    private $beanLink;


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
     * Set beanName
     *
     * @param string $beanName
     * @return Bean
     */
    public function setBeanName($beanName)
    {
        $this->beanName = $beanName;

        return $this;
    }

    /**
     * Get beanName
     *
     * @return string 
     */
    public function getBeanName()
    {
        return $this->beanName;
    }

    /**
     * Set beanLink
     *
     * @param string $beanLink
     * @return Bean
     */
    public function setBeanLink($beanLink)
    {
        $this->beanLink = $beanLink;

        return $this;
    }

    /**
     * Get beanLink
     *
     * @return string 
     */
    public function getBeanLink()
    {
        return $this->beanLink;
    }
}
