<?php

require_once 'funkcje.php';

$funkcje = new Funkcje();


?>
<!DOCTYPE html>
<html lang ="pl">
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<meta charset="utf-8">
		<title>Lista Zapytań</title>
	</head>

	<body>
		<div class="container">
			<div class="jumbotron" style="padding: 70px;">
				<br><br>
				<table>
					<thead><tr><th>Zapytania</th></tr></thead>
					<tbody><?php echo $funkcje->pobierzZapytaniaWspolpracownikow();?></tbody>
				</table>
				
			</div>
		</div>
	</body>
</html>
