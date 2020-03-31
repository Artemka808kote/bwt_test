<?php
require_once __DIR__ . '/public/didom/vendor/autoload.php';
// require_once("app/config/config.php");

//Указываем что мы будем использовать класс Router
use app\core\Router;

//Функция автозагрузки
spl_autoload_register(function ($class) 
{
	//Формируем путь заменяя слеши
	$path = str_replace('\\', '/', $class . '.php');
	//Если файл есть то мы его подключаем
	if (file_exists($path))
	{
		require_once $path;
	}
		
});

session_start();

$router = new Router;
$router->buildRoute();
