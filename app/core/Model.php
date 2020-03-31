<?php

namespace app\core;

use app\config\db;
class Model
{
	protected $db = null;

	public function __construct()
	{
		$this->db = DB::connToDB();
	}
}
