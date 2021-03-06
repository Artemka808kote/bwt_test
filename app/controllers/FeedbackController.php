<?php

namespace app\controllers;

use app\core\Controller;
use app\models\FeedbackModel;
use app\core\View;
class FeedbackController extends Controller
{
	//подключаем файл с версткой
	private $pageTpl =  '/app/views/feedback.php';

	public function __construct()
	{
		$this->model = new FeedbackModel();
		$this->view = new View();
	}

	public function index()
	{
		$this->view->checkAction();
		$this->pageData['title'] = 'Feedback';
		if (!empty($_POST)) {
			if ($this->feedback())
				$this->pageData['feedbackMsg'] = "Ваш отзыв успешно отправлен!";
			else
				$this->pageData['feedbackMsg'] = "Произошла ошибка во время отправки формы!";
		}
		$this->view->gotoPage();
		$this->view->render($this->pageTpl, $this->pageData);
	}

	public function feedback()
	{
		//проверяем, все ли обязательные поля мы ввели, если нет то выводим сообщение об этом
		if (!empty($_POST) && !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['message'])) {
			if (isset($_POST['g-recaptcha-response'])) {
				if ($this->captcha($_POST['g-recaptcha-response'])) {
					//сохраняем введённые данные в переменные для дальнейшей коректной работы
					$feedName = strip_tags(trim($_POST['name']));
					$feedEmail = strip_tags(trim($_POST['email']));
					$feedMessage = strip_tags(trim($_POST['message']));
					$this->model->NewFeedback($feedName, $feedEmail, $feedMessage);
					$theme = "Сообщение с сайта WeatherPHP";
					$letter .= "Имя отправителя: " . $feedName . "\r\n";
					$letter .= "Email отправителя: " . $feedEmail . "\r\n";
					$letter .= "Сообщение: " . $feedMessage . "\r\n";
					mail('artemkakotuh@gmail.com', $theme, $letter);
					return true;
				} else {
					$this->pageData['registerMsg'] = "Вы не прошли капчу";
					return false;
				}
			} else {
				$this->pageData['registerMsg'] = "Вы не заполнили капчу";
				return false;
			}
		} else {
			$this->pageData['registerMsg'] = "Вы заполнили не все поля";
			return false;
		}
	}
	function captcha($key)
	{
		$secret = '6LdyGuUUAAAAAI565d-GBu4Ex8NgLncfomd9l8dc';
		$response = 'https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $key . '&remoteip' . $_SERVER['REMOTE_ADDR'];
		$json = file_get_contents($response);
		$result = json_decode($json);
		if ($result->success == true)
			return true;
		else
			return false;
	}
}
