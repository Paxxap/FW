<?php 

use FW\core\Config;
use FW\core\Router;

require_once 'FW\init.php';

class_autoload('Router');
class_autoload('Config');

$rout = new Router();
$conf = new Config();

$output = Config::get("db/login");
echo "$output";
?>