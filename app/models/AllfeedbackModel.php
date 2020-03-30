<?php

class AllfeedbackModel extends Model
{
	public function getAllfeedback()
	{
		//Выборка данных из таблицы feedbacks
		$sql = 'SELECT name, email, message FROM feedbacks';
		$feedbacks = $this->Allfeedbacks($sql);
		return $feedbacks;
	}

	public function Allfeedbacks($sql)
	{
		$stmt = $this->db->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();
	}
}
