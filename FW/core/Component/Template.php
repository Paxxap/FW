<?php

namespace FW\core\Component;

use FW\core\Page;

class Template
{
    public $componentArr;
    public $__path;
    public $__relativePath;
    public $id;


    function __construct($template, $component)
    {
      $this->componentArr = $component;

      $this->__path = $this->componentArr->__path."\\templates\\".$template."\\";
      $this->__relativePath = $this->createUrl($this->__path);
      $this->id = $template;

    }

    public function render()
    {

      $this->fileConnection("result_modifier.php");
      $this->fileConnection("template.php");
      $this->fileConnection("component_epilog.php");

      $page = Page::getInstance();

      $styleTemplate = $this->__relativePath."style.css";
      $scriptTemplate = $this->__relativePath."script.js";

      if (file_exists($styleTemplate))
      {
        $page->addCss($styleTemplate);
      }

      if (file_exists($scriptTemplate))
      {
        $page->addJs($scriptTemplate);
      }

    }

    public function fileConnection($file)
    {
      $way = $this->__path.$file;
      if(file_exists($way))
      {
        include ($way);
      }
    }

    public function createURL ($path)
    {
      $urlPath = strstr($path, "FW");
      return $urlPath;
    }
}
?>
