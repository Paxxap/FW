<?php 

session_start();

use FW\core\Application;


define ("CORE_DB", true);

spl_autoload_register (function ($class_name)
{
    $file = str_replace('\\', '/', $class_name.'.php');
    if (file_exists ($file))
    {
        require($file);
    }
});

$application = Application::getInstance();

?>