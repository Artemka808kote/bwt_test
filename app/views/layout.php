<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8">
	<title><?php echo $pageData['title']; ?></title>
	<meta name="vieport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="/public/css/bootstrap.min.css">
	<link rel="stylesheet" href="/public/css/layout.css">
</head>

<body>
	<div class="container-fluid table-block">
		<!-- <h1 class="header-text">Сайт с погодой</h1> -->
		<div class="menu">
			<form method="post" class="form-menu">
				<button class="btn btn-primary" type="submit" name="action" value="weather">Посмотреть погоду</button>
				<button class="btn btn-primary" type="submit" name="action" value="feedback">Оставить отзыв</button>
				<button class="btn btn-primary" type="submit" name="action" value="allfeedback">Посмотреть все отзывы</button>
				<button class="btn btn-primary" type="submit" name="action" value="logout">Выйти с аккаунта</button>
			</form>
		</div>
		<!-- /.menu -->
	</div>
	<!-- /.container-fluid -->
</body>

</html>