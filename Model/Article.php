<?php

namespace Framework\Model;

use Framework\Model\Author;

/*
 * Article Entity (Represents article table)
 * @access public
 * @author Evandro Morini
 */
class Article
{
    /*
     * @var integer
     */
    private $id;
    
    /*
     * @var string
     */
    private $title;
    
    /*
     * @var string
     */
    private $content;
    
    /*
     * @var date
     */
    private $publishDate;
    
    /*
     * @var Author
     */
    private $author;
    
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
    function getTitle() 
    {
        return $this->title;
    }

    /**
     * @return string 
     */
    function getContent() 
    {
        return $this->content;
    }

    /**
     * @return date 
     */
    function getPublishDate() 
    {
        return $this->publishDate;
    }
    
    /**
     * @return integer 
     */
    function getAuthor() 
    {
        return $this->author;
    }

    /**
     * @param integer $id
     */
    function setId($id) 
    {
        $this->id = $id;
    }

    /**
     * @param string $title
     */
    function setTitle($title) 
    {
        $this->title = $title;
    }

    /**
     * @param string $content
     */
    function setContent($content) 
    {
        $this->content = $content;
    }

    /**
     * @param date $birthDate
     */
    function setPublishDate($publishDate) 
    {
        $this->publishDate = $publishDate;
    }
    
    /**
     * @param integer $authorId
     */
    function setAuthor(Author $author) 
    {
        $this->author = $author;
    }
    
}
