<?php

require_once("FW\init.php");

$application->pager->addJs("/scripts/script1.js");
$application->pager->addJs("/scripts/script2.js");

$application->pager->addCss("/css/style1.css");
$application->pager->setProperty("Title", "title in my site");

$application->header();
$application->footer();

$application->includeComponent(
  "Transfer/RubUsd",
  "default",
  [
    "count" => 12,
    "type" => "U"
  ]
);

?>

<pre>







--------01.02.2022 - 03.02.2022------------
1) Создание класса Page, добавление инициализации Page в конструктор Application
2) Тестирование работы программы на произвольном примере

--------27.01.2022 - 28.01.2022------------
1)Доработан класс Application
2)Внедрен буффер в класс Application

--------26.01.2022------------
1) Создан трейт Singleton
2) Добавлена константа подключения ядра
3) Создана структура шаблона сайта, указан id шаблона в config


</pre>
