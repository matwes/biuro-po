<?php

require_once 'funkcje.php';

$funkcje = new Funkcje();

if(count($_POST)>0){
  $funkcje->obslozZapytanie(key($_POST), current($_POST));
}

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
			<a href="index.html">Powrót</a>
			<div class="jumbotron" style="padding: 70px;">
				<br><br>
				<form method='post' action='zapytania_wspolpracownikow.php'>
				<table>
					<thead><tr><th>Zapytania</th></tr></thead>
					<tbody><?php echo $funkcje->pobierzZapytaniaWspolpracownikow();?></tbody>
				</table>
				</form>
				
			</div>
		</div>
	</body>
</html>
