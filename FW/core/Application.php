<?php

namespace FW\core;

use FW\core\Page;
use FW\core\Config;
use FW\core\Type\Dictionary;

class Application
{
    use Traits\Singleton;

    private $__components = [];
    public $pager =  null;
    private $template = null;
    private $server;
    private $request;

    function __construct()
    {
        $this->pager = Page::getInstance();
        $this->template = Config::get("templates");
        $this->server = new Server();
        $this->request = new Request();
    }

    function header()
    {
        Application::startBuffer();
        require_once "FW/templates/".$this->template."/header.php";
    }

    function footer()
    {
        require_once "FW/templates/".$this->template."/footer.php";
        Application::endBuffer();
    }

    function startBuffer()
    {
        ob_start();
    }

    function endBuffer()
    {
        $buffer_contents = ob_get_contents();
        $array_replace = $this->pager->getAllReplace();

        $array_replace['#_FW_PAGE_JS#'] =
          implode("\n", $array_replace['#_FW_PAGE_JS#']);
        $array_replace['#_FW_PAGE_CSS#'] =
          implode("\n", $array_replace['#_FW_PAGE_CSS#']);
        $array_replace['#_FW_PAGE_STR#'] =
          implode("\n", $array_replace['#_FW_PAGE_STR#']);

        $buffer_contents = str_replace(array_keys($array_replace), $array_replace, $buffer_contents);
        ob_end_clean();
        echo $buffer_contents;
    }

    function restart()
    {
        ob_end_clean();
        ob_start();
    }

    function GetRequest()
    {
      return $this->request;
    }

    function GetServer()
    {
      return $this->server;
    }

    function includeComponent($component, $template, $params)
    {
      $componentArr = explode("/", $component);
      $componentId = $componentArr[1];
      $this->__components = get_declared_classes();
      $presenceFlag = false;
      foreach($this->__components as $class)
      {
        $classStr = explode("\\", $class);
        foreach ($classStr as $value)
        {
          if ($value == $componentId)
          {
            $presenceFlag = true;
            break;
          }
        }
        if ($presenceFlag) break;
      }
      if ($presenceFlag)
      {
        $instance = new $componentId($componentId, $template, $params);
      }
      else
      {
        include ("FW/components/".$component."/.class.php");
        $instance = new $componentId($componentId, $template, $params);
      }
      $instance->executeComponent();
    }
}
?>
