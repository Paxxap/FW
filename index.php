<?php

require_once("FW\init.php");

$application->pager->setProperty("Title", "Перевод валюты");

$application->pager->addCss("FW/templates/template_1/css/style.css");
$application->pager->addCss("https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css");
$application->pager->addJs("https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js");

$application->header();

/*
$application->includeComponent(
  "Transfer:RubUsd",
  "default",
  [
    "count" => 120,
    "type" => "R"
  ]
); */

$application->includeComponent(
  "Interfaces:Form",
  "default",
  [
    'additional_class' => 'window--full-form', //доп класс на контейнер формы
    'attr' =>
      [ // доп атрибуты
      'data-form-id' => 'form-123'
      ],
    'method' => 'post',
    'action' => '#', //url отправки
    'elements' =>
    [ //список элементов формы
      [
        'type' => 'text',
        'name' => 'accaunt',
        'default' => 'Введите профиль',
        'additional_class' => 'js-login',
        'title' => 'Ссылка на профиль',
        'multiple'
      ],
      [
        'type' => 'text',
        'name' => 'login',
        'additional_class' => 'js-login',
        'attr' =>
        [
          'data-id' => '17'
        ],
        'title' => 'Логин',
        'default' => 'Введите имя'
      ],
      [
        'type' => 'password',
        'name' => 'password',
        'title' => 'Пароль'
      ],
      [
        'type' => 'select',
        'name' => 'server',
        'additional_class' => 'js-login',
        'attr' =>
        [
          'data-id' => '17'
        ],
        'title' => 'Выберите сервер',
        'list' =>
        [
          [
            'title' => 'Онлайнер',
            'value' => 'onliner',
            'additional_class' => 'mini--option',
            'attr' =>
            [
              'data-id' => '188'
            ],
            'selected' => true
          ],
          [
            'title' => 'Тутбай',
            'value' => 'tut',
          ]
        ]
      ],
      [
        'type' => 'checkbox',
        'name' => 'login',
        'additional_class' => 'js-login',
        'value' => 'login',
        'attr' =>
        [
          'data-id' => '17'
        ],
        'title' => 'Логин'
      ],
      [
        'type' => 'tel',
        'name' => 'number',
        'title' => 'Номер телефона'
      ],
      [
        'type' => 'checkbox',
        'name' => 'property',
        'additional_class' => 'js-login',
        'title' => 'Имущество',
        'attr' =>
        [
          'data-id' => '17'
        ],
        'list' =>
        [
          [
            'value' => 'car',
            'title' => 'Машина'
          ],
          [
            'value' => 'bike',
            'title' => 'Мотоцикл'
          ]
        ]
      ]
    ]
  ]
);
$application->footer();

?>

<!--
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
