<?php 

namespace FW\core;

class Application
{
    //свойства на данном этапе:
    private $__components = [];
    private $pager =  null; // будет объект класса
    private static $instance = null;
    private $template = null;//будет объект класса
    //методы

    protected function __construct()
    {
        echo "Конструктор application";
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