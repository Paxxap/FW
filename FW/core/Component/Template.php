<?php

namespace FW\core\Component;

use FW\core\Page;

class Template
{
    public $__path;
    public $__relativePath;
    public $id;

    public $params;
    public $result;

    function __construct($id, $template, $path, $params, $result)
    {
      $this->__path = $path."/".$template."/";
      $this->__relativePath = $this->__path; /// посмотреть когда заработает
      $this->id = $id;

      $this->params = $params;
      $this->result = $result;
    }

    public function render()
    {
      echo $this->__path;
      $this->fileConnection("result_modifier.php");
      $this->fileConnection("template.php");
      $this->fileConnection("component_epilog.php");

      $page = Page::getInstance();

      if (file_exists($this->__path."style.css"))
      {
        //$page->addCss();
      }

      if (file_exists($this->__path."script.js"))
      {
        //$page->addJs();
      }

    }

    public function fileConnection($file)
    {
      if(file_exists($this->__path.$file))
      {
        include ($this->__path.$file);
        if (include ($this->__path.$file))
        {
          echo "я нашел";
        }
      }
    }
}
?>
