<?php 

namespace FW\core;


class Config 
{
    private static $connect;

    private static function connection()
    {
        if (is_null(self::$connect))
        {
            require_once 'FW\config.php';
            self::$connect = $config;
        }
        return self::$connect;
    }

    static function get(string $path) 
    { 
        $config = Config::connection();
        $split = explode('/', $path);
        foreach ($split as $key)
        {
           if (is_array($config) && array_key_exists($key, $config))
           {
               $config = $config[$key];
           } 
           else 
           {
               return null;
           }
        }
        return $config;
    }       
}

?>