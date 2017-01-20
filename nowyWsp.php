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
		<title>Dane nowego wpółpracownika</title>
	</head>
	<body>
		<div class="container">
			<div class="jumbotron">
				<h2 align="center">Dane nowego współpracownika</h2>
				<br/><br/>
				<div class="form-horizontal">
					<div>
						<label for="firma" class="col-sm-4 control-label">Nazwa firmy</label>
							<div class="col-sm-8">
								<p class="nowyWsp">Jakas nazwa</p>
							</div>
					</div>
					<br>
					<div>
						<label for="imie" class="col-sm-4 control-label">Imię</label>
							<div class="col-sm-8">
								<p class="nowyWsp">Patryk</p>
							</div>
					</div>
					<div>
						<label for="nazw" class="col-sm-4 control-label">Nazwisko</label>
							<div class="col-sm-8">
								<p class="nowyWsp">Kowalski</p>
							</div>
					</div>
					<div>
						<label for="tel" class="col-sm-4 control-label">Telefon</label>
							<div class="col-sm-8">
								<p class="nowyWsp">456678569</p>
							</div>
					</div>
					<div>
						<label for="email" class="col-sm-4 control-label">Email</label>
						<div class="col-sm-8">
							<p class="nowyWsp">patryk.k@hmail.com</p><br/>
						</div>
					</div>
					
					<div style="width:90%; margin: 0 auto;">
						<h5 align="center">Zatwierdź poprawność danych</h5><br>
						<div class='test'>
							<div style='float: left;'>
								<button onClick="#" type="button" class="btn btn-primary btn-lg pull-right">Wróc i popraw</button>
							</div>
							<div style='float: right;'>
								<button onClick="#" type="button" class="btn btn-primary btn-lg pull-right">Zatwierdź</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>