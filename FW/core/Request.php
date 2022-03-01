<?php
namespace FW\core;

use FW\core\Type\Dictionary;

class Request extends Dictionary
{
    function __construct()
    {
        $this->request = $_REQUEST;
    }
}
?>
