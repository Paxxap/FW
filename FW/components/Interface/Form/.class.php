<?php
//namespace FW\components\Interface\Form;

use FW\core\Component\Base;
use FW\core\Application;

class Form extends Base
{
  private $application;

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
