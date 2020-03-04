<?php

namespace Framework\Model;

use PDO;

/*
 * Singleton Database Connection
 * @access public
 * @author Evandro Morini
 */

define('PWD', 'Rentcars@2019');
define('USER', 'root');
define('DSN', 'mysql:host=localhost;port=3306;dbname=framework');


class Conn 
{
    private static $conn;
    
    private function __contruct()
    {
        
    }
    
    public static function getInstance()
    {
        if( !isset( self::$conn ) )
        {
            try {
                self::$conn = new PDO(DSN, USER, PWD,
                    [
                        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8',
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                        PDO::ATTR_PERSISTENT => true,
                        PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_ERRMODE,
                    ]
                ); 
            } catch ( PDOException $ex ) {
                $ex->getMessage();
            }
        }
        return self::$conn;
    }
    
}