<?php

session_start();

//Служебные константы
define("ROOT", $_SERVER['DOCUMENT_ROOT']);
define("CONTROLLER_PATH", ROOT . "/app");
define("MODEL_PATH", ROOT . "/app");
define("VIEW_PATH", ROOT . "/app");
//Подключение файлов
require_once("db.php");
require_once("route.php");

require_once MODEL_PATH . '/core/Model.php';
require_once VIEW_PATH . '/core/View.php';
require_once CONTROLLER_PATH . '/core/Controller.php';

Routing::buildRoute();


?>