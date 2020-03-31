<?php

namespace app\controllers;

use app\core\Controller;
use app\models\WeatherModel;
use app\core\View;

use DiDom\Document;
class WeatherController extends Controller
{
	//подключаем файл с версткой
	private $pageTpl =  '/app/views/weather.php';

	public function __construct()
	{
		$this->model = new WeatherModel();
		$this->view = new View();
	}

	public function index()
	{
		$this->view->checkAction();
		$this->pageData['title'] = 'Погода в Запорожье на сегодня';

		$document = new Document('http://www.gismeteo.ua/city/daily/5093/', true);

		$mainContent = $document->find('.tab_wrap')['1'];
		$weatherIcon = $mainContent->first('.img')->html();
		$todayDate = $mainContent->first('.date')->text();
		$valueT_tmp = $mainContent->find('.value');

		foreach ($valueT_tmp as $value) {
			$valueT[] = $value->find('.unit_temperature_c')['0']->text();
		}
		$mainContentDetails = $document->first('.widget__container');

		$weatherTime = $mainContentDetails->first('.widget__row_time')->children();
		$weatherIcons = $mainContentDetails->first('.widget__row_icon')->children();

		$valueTemp_tmp = $mainContentDetails->first('.values')->children();
		foreach ($valueTemp_tmp as $value) {
			$valueTemp[] = $value->first('.unit_temperature_c')->text();
		}

		$windSpeed_tmp = $mainContentDetails->first('.widget__row_wind-or-gust')->children();
		foreach ($windSpeed_tmp as $value) {
			$windSpeed[] = $value->first('.unit_wind_m_s')->text();
		}

		$precipitation_tmp = $mainContentDetails->first('.widget__row_precipitation')->children();
		foreach ($precipitation_tmp as $value) {
			$precipitation[] = $value->first('.w_prec__value');
		}

		$this->pageData['todayDate'] = $todayDate;
		$this->pageData['weatherIcon'] = $weatherIcon;
		$this->pageData['MinTemp'] = $valueT[0];
		$this->pageData['MaxTemp'] = $valueT[1];
		$this->pageData['weatherTime'] = $weatherTime;
		$this->pageData['weatherIcons'] = $weatherIcons;
		$this->pageData['valueTemp'] = $valueTemp;
		$this->pageData['windSpeed'] = $windSpeed;
		$this->pageData['precipitation'] = $precipitation;
		$this->view->gotoPage();
		$this->view->render($this->pageTpl, $this->pageData);
	}
}
