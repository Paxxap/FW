<?php 

use FW\core\Config;
use FW\core\Router;

require_once 'FW\init.php';

$rout = new Router();

$output = Config::get("db/login");
$output1 = Config::get("db1/login1");

var_dump($output);
var_dump($output1);
?>