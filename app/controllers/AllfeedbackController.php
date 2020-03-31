<?php

namespace app\controllers;

use app\core\Controller;
use app\models\AllfeedbackModel;
use app\core\View;
class AllfeedbackController extends Controller
{
	//подключаем фал с версткой
	private $pageTpl =  '/app/views/allfeedback.php';

	public function __construct()
	{
		$this->model = new AllfeedbackModel();
		$this->view = new View();
	}

	public function index()
	{
		$this->view->checkAction();
		$this->pageData['title'] = 'Allfeedback';
		$this->pageData['feedbacks'] = $this->model->getAllfeedback();
		$this->view->gotoPage();
		$this->view->render($this->pageTpl, $this->pageData);
	}
}
