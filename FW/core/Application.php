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
      $componentPath = explode(":", $component);
      $componentWay = $componentPath[0];
      $componentId = $componentPath[1];

      $firstClassList = get_declared_classes();
      $connectWay = "FW/components/".$componentWay."/".$componentId."/.class.php";
      $parentClassWay = 'FW\core\Component\Base';

      if (!isset($this->__components[$componentId]))
      {
        if(file_exists($connectWay))
        {
          include $connectWay;
        }
        else
        {
          throw new Exception ("file not found");
          die();
        }
        $secondClassList = get_declared_classes();
        $difference = array_diff($secondClassList, $firstClassList);
        if (!empty($difference))
        {
        foreach ($difference as $componentDiff)
          {
            if (is_subclass_of($componentDiff, $parentClassWay))
            {
              $this->__components[$componentId] = $componentDiff;
              break;
            }
          }
        }
      }

    $className = $this->__components[$componentId];

    $partWay = $componentWay."\\".$componentId;

    $component = new $className($componentId, $template, $params, $partWay);
    $component->executeComponent();
  }
}
?>
