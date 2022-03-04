<?php
namespace FW\components\Interfaces;

use FW\core\Component\Base;
use FW\core\Application;

class Form extends Base
{
  private $generalTemp;
  function __construct($componentId, $template, $params, $partWay)
  {
    $component__path = __DIR__;
    $this->params = $params;
    $this->generalTemp = $template;
    parent::__construct($componentId, $template, $component__path, $partWay);
  }

  function  executeComponent()
  {
    $this->template->render();
    $application = Application::getInstance();
    $elements = $this->params["elements"];
    foreach($elements as $value)
    {
      foreach($value as $key => $atribute)
      {
        if ($key == "type")
        {
        switch($atribute)
          {
          case "text":
            if (in_array("multiple", $value))
            {
              $application->includeComponent("Interfaces:TextMultiple", $this->generalTemp, $value);
            }
            else
            {
              $application->includeComponent("Interfaces:Text", $this->generalTemp, $value);
            }
            break;
          case "password":
            $application->includeComponent("Interfaces:Password", $this->generalTemp, $value);
            break;
          case "select":
            if (array_key_exists("multiple", $value))
            {
              $application->includeComponent("Interfaces:SelectMultiple", $this->generalTemp, $value);
            }
            else
            {
              $application->includeComponent("Interfaces:Select", $this->generalTemp, $value);
            }
            break;
          case "checkbox":
            if (array_key_exists("list", $value))
            {
              $application->includeComponent("Interfaces:CheckboxMultiple", $this->generalTemp, $value);
            }
            else
            {
              $application->includeComponent("Interfaces:Checkbox", $this->generalTemp, $value);
            }
            break;
          case "textarea":
            $application->includeComponent("Interfaces:Textarea", $this->generalTemp, $value);
            break;
          case "radio":
            $application->includeComponent("Interfaces:Radio", $this->generalTemp, $value);
            break;
          case "tel":
            $application->includeComponent("Interfaces:Number", $this->generalTemp, $value);
            break;
          }
        }
      }
    }
    $application->includeComponent("Interfaces:EndForm", $this->generalTemp, $this->params);
  }
}
?>
