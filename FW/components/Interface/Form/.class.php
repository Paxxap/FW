<?php

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
    /*$this->application = Application::getInstance();
    $elements = $this->params["elements"];
  //  include "form.php";
    foreach($elements as $value)
    {
      foreach($value as $key => $element)
      {
        if ($key == "type")
        {
        switch($element)
          {
          case "text":
  //  include "text.php";
            $this->application->includeComponent("Interface:Text", "default", $value);
            break;
          case "password":
  //  include "password.php";
            $this->application->includeComponent("Interface:Password", "default", $value);
            break;
          case "select":
 //  include "select.php";
            $this->application->includeComponent("Interface:Select", "default", $value);
            break;
          case "checkbox":
//  include "checkbox.php";
            $this->application->includeComponent("Interface:Checkbox", "default", $value);
            break;
          case "textarea":
            $this->application->includeComponent("Interface:Textarea", "default", $value);
//    include "textarea.php";
            break;
          case "radio":
            $this->application->includeComponent("Interface:Radio", "default", $value);
//    include "radio.php";
            break;
          case "tel":
            $this->application->includeComponent("Interface:Number", "default", $value);
//    include "number.php";
            break;
          }
        }
      }
    }
    //include "endform.php"; */
    $this->template->render();
  }

}
?>
