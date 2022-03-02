<?php
//namespace FW\components\Interface\TextMultiple;

use FW\core\Component\Base;

class TextMultiple extends Base
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
