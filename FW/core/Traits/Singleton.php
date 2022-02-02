<?php 

namespace FW\core\Traits;

trait Singleton 
{
    private static $instance;


    public function getInstance()
    {
        if (self::$instance === null)
        {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function __construct()
    {
        
    }
    private function __clone()
    {

    }
    private function __wakeup()
    {
        throw new \Exception ("Cannot unserialize a singleton");
    }
}


?>


