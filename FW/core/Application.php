<?php 

namespace FW\core;

use FW\core\Page;



class Application
{
    use Traits\Singleton;

    private $__components = [];
    private $pager =  null; // будет объект класса
    private $template = null;//будет объект класса

    function __construct()
    {
        $this->pager = Page::getInstance();
        $this->template = Config::get('template_1');
    }

    static function header()
    {
        include ("FW/templates/$this->template/header.php");
        Application::startBuffer();
    }

    static function footer()
    {
        include ("FW/templates/$this->template/footer.php")
        Application::endBuffer();
    }

    static function startBuffer()
    {
        ob_start();
    }

    static function endBuffer()
    {
        $buffer_contents = ob_get_contents();
        $array_replace = $this->pager->getAllReplace();
        
    }

    static function restart()
    {
        ob_end_clean();
        ob_start();
    }
}
?>