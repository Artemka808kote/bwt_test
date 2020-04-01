<?php

namespace app\models;

use app\core\Model;

use PDO;
class RegistrModel extends Model
{
	public function checkUser($email, $password)
	{

		//Проверяем правельность введённых данных
		$sql = "SELECT * FROM users WHERE email = :email AND password = :password";
		
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(":email", $email, PDO::PARAM_STR);
		$stmt->bindValue(":password", $password, PDO::PARAM_STR);
		$stmt->execute();

		$res = $stmt->fetch(PDO::FETCH_ASSOC);
		//если мы авторизировались то переходим на страницу с менюшкой
		if (!empty($res)) 
		{
			$_SESSION['action'] = 'login';
			header("Location: /layout");
		} else
			return false;
	}

	public function registerNewUser($regName, $regSurname, $regEmail, $regPassword, $regGender, $regBirth)
	{
		//Добавляем в базу данных информацию о юзере
		$sql = "INSERT INTO users(name, surname, email, password, gender, birth)
				VALUES (:name, :surname, :email, :password, :gender, :birth)";
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(":name", $regName, PDO::PARAM_STR);
		$stmt->bindValue(":surname", $regSurname, PDO::PARAM_STR);
		$stmt->bindValue(":email", $regEmail, PDO::PARAM_STR);
		$stmt->bindValue(":password", $regPassword, PDO::PARAM_STR);
		$stmt->bindValue(":gender", $regGender, PDO::PARAM_BOOL);
		$stmt->bindValue(":birth", $regBirth, PDO::PARAM_STR);
		$stmt->execute();
	}
}
