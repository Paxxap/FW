<?php 

namespace FW\core;

use FW\core\Page;
use FW\core\Config;


class Application
{
    use Traits\Singleton;

    private $__components = [];
    public $pager =  null; 
    private $template = null;

    function __construct()
    {
        $this->pager = Page::getInstance();
        $this->template = Config::get("templates");
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
        $buffer_contents = str_replace(array_keys($array_replace), $array_replace, $buffer_contents);
        ob_end_clean();
        echo $buffer_contents;
    }

    function restart()
    {
        ob_end_clean();
        ob_start();
    }
}
?>