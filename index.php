<?php
ini_set("display_errors",1);
error_reporting(E_ALL);

define('ROOT', dirname(__FILE__));
// Это класс, разбирающий наши запросы и получающий нужный нам класс что будет обрабатывать наш запрос и метод
require_once(ROOT."/components/Router.php");
// Это подключение к базе данных
require_once(ROOT.'/components/Db.php');

session_start();



// Создаём объект класса
$router = new Router();
// Вызываем его метод
$router->run();