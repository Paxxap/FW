<?php 

namespace FW\core;


class Config 
{

    function __construct()
    {
        echo "Конструктор config";
    }

    static function get(string $path) 
    { 
        require_once "FW\config.php";
        $split = explode('/', $path);
        foreach ($split as $key)
        {
           if (is_array($config) && array_key_exists($key, $config))
           {
               $config = $config[$key];
           }
           else 
           {
               echo "NoN";
               return null;
           }
        }
        return $config;
    }       
}

?>