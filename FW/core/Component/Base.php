<?php

namespace FW\core\Component;

abstract class Base
{
    public $result = array();
    public $id;
    public $params = array();
    public $template;
    public $__path;


    abstract protected function executeComponent();

    function __construct()
    {
      
    }


}

?>
