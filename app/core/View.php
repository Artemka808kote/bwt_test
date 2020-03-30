<?php

class View
{
	public function render($tpl, $pageData)
	{
		include ROOT . $tpl;
	}
	public function redirect($url)
	{
		header('location: ' . $url);
		exit;
	}

}