<?php
namespace FW\core;

use FW\core\Type\Dictionary;

class Server extends Dictionary
{
    function __construct()
    {
        $this->server = $_SERVER;
    }
}
?>
