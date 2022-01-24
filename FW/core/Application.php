<?php 

namespace FW\core;

class Application
{
   
    private $__components = [];
    private $pager =  null; // будет объект класса
    private static $instance = null;
    private $template = null;//будет объект класса

    protected function __construct()
    {

    }
    
    protected function __clone() {}

    public function __wakeup() // Про невосстанавливаемость  из строк
    {
        throw new \Exception ("Cannot unserialize a singleton");
    }

    public static function getInstance()
    {
        if (null === self::$instance)
        {
            self::$instance = new self();
        }
        return self::$instance;
    }
}
?>