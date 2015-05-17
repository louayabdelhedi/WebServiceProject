<?php

namespace WebService\WebServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Test
 *
 * @ORM\Table(name="test")
 * @ORM\Entity
 */
class Test
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
     * @ORM\Column(name="descTest", type="string", length=255)
     */
    private $descTest;


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
     * Set descTest
     *
     * @param string $descTest
     * @return Test
     */
    public function setDescTest($descTest)
    {
        $this->descTest = $descTest;

        return $this;
    }

    /**
     * Get descTest
     *
     * @return string 
     */
    public function getDescTest()
    {
        return $this->descTest;
    }
}
