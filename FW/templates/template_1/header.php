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
    <meta charset="utf-8">
    <? $application->pager->showHead(); ?>
    <title><? $application->pager->showProperty("Title"); ?></title>
</head>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-xxl">
  <a class="navbar-brand" href="#">CampWork</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>

    </ul>
    <form class="form-inline my-2 my-lg-0">
      <div>
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </div>
    </form>
  </div>
</div>
</nav>
</header>
