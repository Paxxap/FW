<?php 
require_once 'Dev.php';

function class_autoload($class_name)
{
    $file = str_replace('\\', '/', $class_name.'.php');
    if (file_exists ($file))
    {
        require_once($file);
    }
    spl_autoload_register('class_autoload');
}

session_start();

?>