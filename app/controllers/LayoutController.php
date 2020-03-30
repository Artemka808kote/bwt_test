<?php


class LayoutController extends Controller
{
	//подключаем файл с версткой
	private $pageTpl =  '/app/views/layout.php';

	public function __construct()
	{
		$this->model = new LayoutModel();
		$this->view = new View();
	}

	public function index()
	{
		$this->view->checkAction();
		$this->pageData['title'] = 'Layout';
		$this->view->gotoPage();
		$this->view->render($this->pageTpl, $this->pageData);
	}
}