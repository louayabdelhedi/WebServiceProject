<?php

namespace WebService\WebServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Project
 *
 * @ORM\Table(name="project")
 * @ORM\Entity
 */
class Project
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
     * @ORM\Column(name="descProject", type="string", length=255)
     */
    private $descProject;

    /**
     * @var string
     *
     * @ORM\Column(name="host", type="string", length=255)
     */
    private $host;

    /**
     * @var string
     *
     * @ORM\Column(name="dbName", type="string", length=255)
     */
    private $dbName;

    /**
     * @var string
     *
     * @ORM\Column(name="loginDb", type="string", length=255)
     */
    private $loginDb;

    /**
     * @var string
     *
     * @ORM\Column(name="pwdDb", type="string", length=255)
     */
    private $pwdDb;


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
     * Set descProject
     *
     * @param string $descProject
     * @return Project
     */
    public function setDescProject($descProject)
    {
        $this->descProject = $descProject;

        return $this;
    }

    /**
     * Get descProject
     *
     * @return string 
     */
    public function getDescProject()
    {
        return $this->descProject;
    }

    /**
     * Set host
     *
     * @param string $host
     * @return Project
     */
    public function setHost($host)
    {
        $this->host = $host;

        return $this;
    }

    /**
     * Get host
     *
     * @return string 
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * Set dbName
     *
     * @param string $dbName
     * @return Project
     */
    public function setDbName($dbName)
    {
        $this->dbName = $dbName;

        return $this;
    }

    /**
     * Get dbName
     *
     * @return string 
     */
    public function getDbName()
    {
        return $this->dbName;
    }

    /**
     * Set loginDb
     *
     * @param string $loginDb
     * @return Project
     */
    public function setLoginDb($loginDb)
    {
        $this->loginDb = $loginDb;

        return $this;
    }

    /**
     * Get loginDb
     *
     * @return string 
     */
    public function getLoginDb()
    {
        return $this->loginDb;
    }

    /**
     * Set pwdDb
     *
     * @param string $pwdDb
     * @return Project
     */
    public function setPwdDb($pwdDb)
    {
        $this->pwdDb = $pwdDb;

        return $this;
    }

    /**
     * Get pwdDb
     *
     * @return string 
     */
    public function getPwdDb()
    {
        return $this->pwdDb;
    }
}
