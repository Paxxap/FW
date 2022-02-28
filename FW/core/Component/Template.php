<?php

namespace FW\core\Component;

use FW\core\Page;

class Template
{
    public $component;
    public $__path;
    public $__relativePath;
    public $id;


    function __construct($template, $component)
    {
      $this->component = $component;
      $this->__path = $this->component->__path."\\templates\\".$template."\\";
      $this->__relativePath = "FW\components\\".$this->component->partWay."\\templates\\".$template."\\";
      $this->id = $template;

    }

    public function render($page = "template")
    {

      $this->fileConnection("result_modifier.php");
      $this->fileConnection("$page.php");
      $this->fileConnection("component_epilog.php");

      $page = Page::getInstance();

      $styleTemplate = $this->__relativePath."style.css";
      $scriptTemplate = $this->__relativePath."script.js";

      if (file_exists($this->__path."style.css"))
      {
        $page->addCss($styleTemplate);
      }

      if (file_exists($this->__path."script.js"))
      {
        $page->addJs($scriptTemplate);
      }

    }

    public function fileConnection($file)
    {
      $result = $this->component->result;
      $params = $this->component->params;
      $way = $this->__path.$file;
      if(file_exists($way))
      {
        include ($way);
      }
    }
}
?>
