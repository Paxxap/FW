<?php 

require ('FW\init.php');

if (defined("CORE_DB") == false)
{
    die();
}

?>

<!DOCTYPE html>
<html lang="ru"> 
<head> 
    <? $application->pager->showHead(); ?>
    <title><? $application->pager->showProperty("Title"); ?></title>
</head>
<body> 
