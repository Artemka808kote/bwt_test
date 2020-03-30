<?php


class FeedbackController extends Controller
{
	//подключаем файл с версткой
	private $pageTpl =  '/app/views/feedback.php';

	public function __construct()
	{
		$this->model = new FeedbackModel();
		$this->view = new View();
	}

}
