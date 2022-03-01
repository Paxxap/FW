<?php

use FW\core\Component\Base;

class Text extends Base
{

  function __construct($componentId, $template, $params, $partWay)
  {
    $component__path = __DIR__;
    $this->params = $params;
    parent::__construct($componentId, $template, $component__path, $partWay);
  }

  function  executeComponent()
  {


    $this->template->render();
  }

}
?>
