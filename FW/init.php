<?php 

spl_autoload_register (function ($class_name)
{
    $file = str_replace('\\', '/', $class_name.'.php');
    if (file_exists ($file))
    {
        require($file);
    }
});

session_start();

?>