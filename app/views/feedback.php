<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $pageData['title']; ?></title>
	<link rel="stylesheet" href="/public/css/registr_style.css">
	<script src="https://www.google.com/recaptcha/api.js"></script>
	<script src="/public/js/feedback.js"></script>
</head>

<body>
	<?php include 'layout.php'; ?>
	<div class="container-fluid table-block">
		<div class="account-wall">
			<h2 class="text-center login-title header-text">Форма обратной связи</h2>
			<form method="post" class="form-signin" id="form-reg" name="form-reg">
				<?php if (!empty($pageData['feedbackMsg'])) :
				?>
					<p><?php echo $pageData['feedbackMsg'];
						?></p>
				<?php endif;
				?>
				<input type="text" name="name" class="form-control" id="regName" placeholder="Имя" required>
				<input type="email" name="email" class="form-control" id="regEmail" placeholder="Email" required>
				<textarea name="message" id="" cols="40" rows="10" placeholder="Text"></textarea>
				<div class="g-recaptcha" data-sitekey="6LdyGuUUAAAAAO4lBcHVMkGKVwk9zmUzbzMJJ-Lo"></div>
				<input type="submit" class="btn btn-lg btn-primary btn-block" value="Отправить форму" />
		</div>

		</form>
	</div>
	<!-- /.account-wall -->
	</div>
	<!-- /.container-fluid -->
</body>

</html>