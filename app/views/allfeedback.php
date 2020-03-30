<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $pageData['title']; ?></title>
</head>

<body>
	<?php include 'layout.php'; ?>
	<h2 class="text-center">Список фидбеков</h2>
	<div class="container">
		<div class="content">
			<?php
			for ($i = 0; $i < count($pageData['feedbacks']); $i++) { ?>
				<p class="card-text"><?php echo "Имя отправителя: " . $pageData['feedbacks'][$i]['name'] . "<br>" ?></p>
				<p class="card-text"><?php echo "Email отправителя: " . $pageData['feedbacks'][$i]['email'] . "<br>" ?></p>
				<p class="card-text"><?php echo "Сообщение: " . $pageData['feedbacks'][$i]['message'] . "<br><br>" ?></p>
			<?php } ?>
		</div>
		<!-- /.content -->
	</div>
	<!-- /.container -->
</body>

</html>