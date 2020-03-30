<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8">
	<title><?php echo $pageData['title']; ?></title>
	<meta name="vieport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="/public/css/bootstrap.min.css">
	<link rel="stylesheet" href="/public/css/registr_style.css">
</head>

<body>
	<div id="content">
		<div class="container-fluid table-block">
			<div class="row table-cell-block" class="col-sm-6">
				<div class="account-wall">
					<h1 class="text-center login-title">Вход</h1>
					<form method="post" class="form-signin" id="form-signin" name="form-signin">
						<input type="hidden" name="action" value="login">
						<?php if (!empty($pageData['errorlogin'])) : ?>
							<p><?php echo $pageData['errorlogin']; ?></p>
						<?php endif; ?>
						<input type="text" name="email" class="form-control" id="email" placeholder="Email" required autofocus>
						<input type="password" name="password" class="form-control" id="password" placeholder="Пароль" required>
						<input type="submit" class="btn btn-lg btn-primary btn-block" value="Вход" />
					</form>
				</div>
				<!-- /.account-wall -->
				<div class="account-wall">
					<h1 class="text-center login-title">Регистрация</h1>
					<form method="post" class="form-signin" id="form-reg" name="form-reg">
						<input type="hidden" name="action" value="register">
						<?php if (!empty($pageData['registerMsg'])) :
						?>
							<p><?php echo $pageData['registerMsg'];
								?></p>
						<?php endif;
						?>
						<input type="text" name="name" class="form-control" id="regName" placeholder="Имя" required>
						<input type="text" name="surname" class="form-control" id="regSurname" placeholder="Фамилия" required>
						<input type="email" name="email" class="form-control" id="regEmail" placeholder="Email" required>
						<input type="password" name="password" class="form-control" id="regPassword" placeholder="Пароль" required>
						<div class="form-group">
							<label class="control-label">Пол:</label>
							<label class="radio-inline"><input type="radio" name="gender" value=0> Мужской</label>
							<label class="radio-inline"><input type="radio" name="gender" value=1> Женский</label>
						</div>
						<div class="form-group">
							<label for="dateofbirth" class="control-label">Дата рождения</label>
							<input type="date" class="form-control" name="birth" id="regBirth">
						</div>
						<input type="submit" class="btn btn-lg btn-primary btn-block" value="Регистрация" />
					</form>
				</div>
				<!-- /.account-wall -->
			</div>
			<!-- /.row table-cell-block -->
		</div>
		<!-- /.container-fluid -->
	</div>
	<!-- /#content -->
</body>

</html>