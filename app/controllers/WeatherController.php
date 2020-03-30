<?php

use DiDom\Document;
use DiDom\Element;

class WeatherController extends Controller
{
	//подключаем файл с версткой
	private $pageTpl =  '/app/views/weather.php';

	public function __construct()
	{
		$this->model = new WeatherModel();
		$this->view = new View();
	}

}
