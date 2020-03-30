<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/public/css/bootstrap.min.css">
	<link rel="stylesheet" href="/public/css/weather.css">
	<title><?php echo $pageData['title']; ?></title>
</head>

<body>
	<?php include 'layout.php'; ?>
	<h2 class="text-center">Погода в Запорожье на сегодня</h2>
	<div class="container-fluid table-block">
		<div class="weather-main container-fluid table-block">
			<div class="container-fluid table-block">
				<?php
				echo $pageData['todayDate'];
				echo $pageData['weatherIcon'];
				?>
			</div>
			<?php
			echo "Минимальная температура: " . $pageData['MinTemp'] . "<br>";
			echo "Максимальная температура: " . $pageData['MaxTemp'] . "<br><br>";
			?>
		</div>
		<!-- /.weather-main -->
		<div class="weather-table ">
			<?php
			echo "<table border='1.5' cellpadding='5'>";
			echo "<th scope='col'>" . "Время" . "</th>";
			foreach ($pageData['weatherTime'] as $value) {
				echo "<td align='center' width='20' height='20'>" . strip_tags($value, "<sup>") . "</td>";
			}
			echo "<tr />";
			echo "<th scope='col'>" . "Погодные значки" . "</th>";
			foreach ($pageData['weatherIcons'] as $value) {
				echo "<td align='center' width='20' height='20'>" . strip_tags($value, "<path><svg><g>") . "</td>";
			}
			echo "<tr />";
			echo "<th scope='col'>" . "Температура" . "</th>";
			foreach ($pageData['valueTemp'] as $value) {
				echo "<td align='center' width='20' height='20'>" . strip_tags($value, "<path><svg><g>") . "</td>";
			}
			echo "<tr />";
			echo "<th scope='col'>" . "Скорость ветра, м/с" . "</th>";
			foreach ($pageData['windSpeed'] as $value) {
				echo "<td align='center' width='20' height='20'>" . strip_tags($value, "<path><svg><g>") . "</td>";
			}
			echo "<tr />";
			echo "<th scope='col'>" . "Осадки" . "</th>";
			foreach ($pageData['precipitation'] as $value) {
				echo "<td align='center' width='20' height='20'>" . strip_tags($value, "<path><svg><g>") . "</td>";
			}
			echo "<tr />";
			echo "</table>";
			?>
		</div>
		<!-- /.weather-table -->
	</div>
	<!-- /.ontainer-fluid table-block -->
</body>

</html>




<!--  -->