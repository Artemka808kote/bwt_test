<?php

namespace app\core;

class View
{
	public function render($tpl, $pageData)
	{
		include $_SERVER['DOCUMENT_ROOT'] . $tpl;
	}
	public function redirect($url)
	{
		header('location: ' . $url);
		exit;
	}
	//если контроллер не найден выводим ошибку 404
	public static function errorPage($code)
	{
		http_response_code($code);
		echo "Страница 404";
	}
	//переход по страницам (дефолтная страница - layout.php)
	public function gotoPage()
	{
		if (!empty($_POST)) 
		{
			$action = strip_tags(trim($_POST['action']));
			switch ($action) {
				case 'weather':
					header("Location: /weather");
					break;
				case 'feedback':
					header("Location: /feedback");
					break;
				case 'allfeedback':
					header("Location: /allfeedback");
					break;
				case 'logout':
					header("Location: /");
					session_destroy();
					break;
			}
		}
	}
	//Проверяем, была ли авторизация, если нет то перенаправляем на страницу регистрации (авторизации)
	public function checkAction()
	{
		if (!$_SESSION['action'])
			header("Location: /");
	}
}