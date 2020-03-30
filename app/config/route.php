<?php

class Routing
{
	public static function buildRoute()
	{
		$controllerName = "RegistrController";
		$modelName = "RegistrModel";
		$action = "index";

		$route = explode("/", $_SERVER['REQUEST_URI']);

		//Определяем контроллер
		if($route[1] != '')
		{
			$controllerName = ucfirst($route[1] . "Controller");
			$modelName = ucfirst($route[1] . "Model");
		}
		$pathModel = MODEL_PATH . "/models/" . $modelName . ".php";
		$pathController = CONTROLLER_PATH . "/controllers/" . $controllerName . ".php";

		//Проверяем наличие контроллеров и моделей
		if (file_exists($pathModel) && file_exists($pathController))
		{
			//подключаем файлы
			include $pathModel;
			include $pathController;
			if (isset($route[2]) && $route[2] != '')
				$action = $route[2];
				
			$controller = new $controllerName();
			$controller->$action();
		}
		//если файл не найдет то показываем страницу 404
		else
			View::errorPage(404);
	}
}
