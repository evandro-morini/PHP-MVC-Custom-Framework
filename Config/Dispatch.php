<?php

namespace Framework\Config;

/*
 * Create routes for views
 * @access public
 * @author Evandro Morini
 */
class Dispatch
{
    /*
     * @var string;
     */
    private $path;
    
    public function __construct()
    {
        if(!isset($_SESSION))
        {
            session_start();
        }
    }
    
    function render($filename, $params)
    {
        $this->path = $_SERVER['DOCUMENT_ROOT'] . '/Framework/View/' . $filename . '.php';
        try
        {
            if(file_exists($this->path))
            {
                extract($params);
                include($this->path);
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

}