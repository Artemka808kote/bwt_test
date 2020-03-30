<?php

class AllfeedbackController extends Controller
{
	//подключаем файл с версткой
	private $pageTpl =  '/app/views/allfeedback.php';

	public function __construct()
	{
		$this->model = new AllfeedbackModel();
		$this->view = new View();
	}
}
