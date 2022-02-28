<?php

use FW\core\Component\Base;

class RubUsd extends Base
{

  function __construct($componentId, $template, $params, $partWay)
  {
    $component__path = __DIR__;
    $this->params = $params;
    parent::__construct($componentId, $template, $component__path, $partWay);
  }

  function  executeComponent()
  {
    switch ($this->params["type"])
    {
      case "U" :
        $this->result =
        [
          "message" => "В RUB: ",
          "count" => round($this->params["count"] * 75.68, 2)
        ];
        break;
      case "R" :
        $this->result =
        [
          "message" => "В USD: ",
          "count" => round($this->params["count"] / 75.68, 2)
        ];
        break;
    }
    $this->template->render();
  }

}
?>
