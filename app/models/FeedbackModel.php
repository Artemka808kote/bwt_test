<?php

class FeedbackModel extends Model
{
	public function NewFeedback($feedName, $feedEmail, $feedMessage)
	{
		//Добавляем в базу данных информацию обратной связи
		$sql = "INSERT INTO feedbacks (name, email, message, idusers)
				VALUES (:name, :email, :message, 1)";
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(":name", $feedName, PDO::PARAM_STR);
		$stmt->bindValue(":email", $feedEmail, PDO::PARAM_STR);
		$stmt->bindValue(":message", $feedMessage, PDO::PARAM_STR);
		$stmt->execute();
	}
}
