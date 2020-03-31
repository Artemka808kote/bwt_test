<?php

namespace app\controllers;

use app\core\Controller;
use app\models\RegistrModel;
use app\core\View;
class RegistrController extends Controller
{
	//подключаем файл с версткой
	private $pageTpl = '/app/views/registr.php';

	public function __construct()
	{
		$this->model = new RegistrModel();
		$this->view = new View();
	}

	public function index()
	{
		$this->pageData['title'] = "Вход в личный кабинет";
		if (!empty($_POST))
		{
			//определяем какую форму мы заполняли и выводим сообщения
			$action = strip_tags(trim($_POST['action']));
			switch ($action) 
			{
				case 'login':
					$email = strip_tags(trim($_POST['email']));
					$password = strip_tags(trim(md5($_POST['password'])));
					if (!$this->model->checkUser($email, $password))
						$this->pageData['errorlogin'] = "Неправильный логин или пароль";
					break;
				case 'register':
					if ($this->register())
						$this->pageData['registerMsg'] = "Вы успешно зарегистрированы. Пожалуйста, авторизуйтесь";
					else
						$this->pageData['registerMsg'] = "Произошла ошибка во время регистрации";
					break;
			}
		}
		$this->view->render($this->pageTpl, $this->pageData);
	}

	public function register()
	{
		//проверяем, все ли обязательные поля мы ввели, если нет то выводим сообщение об этом
		if (!empty($_POST) && !empty($_POST['name']) && !empty($_POST['surname']) && !empty($_POST['email']) && !empty($_POST['password'])) 
		{
			//сохраняем введённые данные в переменные для дальнейшей коректной работы
			$regName = strip_tags(trim($_POST['name']));
			$regSurname = strip_tags(trim($_POST['surname']));
			$regEmail = strip_tags(trim($_POST['email']));
			$regPassword = strip_tags(trim(md5($_POST['password'])));
			$regGender = strip_tags(trim($_POST['gender']));
			$regBirth = strip_tags(trim($_POST['birth']));
			
			$this->model->registerNewUser($regName, $regSurname, $regEmail, $regPassword, $regGender, $regBirth);
			return true;
		} 
		else 
		{
			$this->pageData['registerMsg'] = "Вы заполнили не все поля";
			return false;
		}
	}
}
