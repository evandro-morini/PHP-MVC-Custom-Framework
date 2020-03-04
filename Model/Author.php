<?php

namespace Framework\Model;

/*
 * Author Entity (Represents author table)
 * @access public
 * @author Evandro Morini
 */
class Author
{
    /*
     * @var integer
     */
    private $id;
    
    /*
     * @var string
     */
    private $name;
    
    /*
     * @var string
     */
    private $email;
    
    /*
     * @var string
     */
    private $pwd;
    
    /*
     * @var string
     */
    private $bio;
    
    /*
     * @var date
     */
    private $birthDate;
    
    /**
     * @return integer 
     */
    function getId() 
    {
        return $this->id;
    }

    /**
     * @return string 
     */
    function getName() 
    {
        return $this->name;
    }
    
    /**
     * @return string 
     */
    function getEmail() 
    {
        return $this->email;
    }
    
    /**
     * @return string 
     */
    function getPwd() 
    {
        return $this->pwd;
    }

    /**
     * @return string 
     */
    function getBio() 
    {
        return $this->bio;
    }

    /**
     * @return date 
     */
    function getBirthDate() 
    {
        return $this->birthDate;
    }

    /**
     * @param integer $id
     */
    function setId($id) 
    {
        $this->id = $id;
    }

    /**
     * @param string $name
     */
    function setName($name) 
    {
        $this->name = $name;
    }
    
    /**
     * @param string $email
     */
    function setEmail($email) 
    {
        $this->email = $email;
    }
    
    /**
     * @param string $email
     */
    function setPwd($pwd) 
    {
        $this->pwd = $pwd;
    }

    /**
     * @param string $bio
     */
    function setBio($bio) 
    {
        $this->bio = $bio;
    }

    /**
     * @param date $birthDate
     */
    function setBirthDate($birthDate) 
    {
        $this->birthDate = $birthDate;
    }
    
}
