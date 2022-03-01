<?php

namespace FW\core\Component;

use FW\core\Component\Template;

abstract class Base
{
    public $result = array();
    public $id;
    public $params = array();
    public $template;
    public $__path;
    public $partWay;


    abstract protected function executeComponent();

    function __construct($id, $template, $path, $partWay)
    {
      $this->id = $id;
      $this->__path = $path;
      $this->partWay = $partWay;
      $this->template = new Template($template, $this);
    }


}

?>
