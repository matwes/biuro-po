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
		<title>Dodawanie nowego wspólpracownika</title>
	</head>

	<body>
		<div class="container">
			<div class="jumbotron" style="padding: 70px;">
				<h2 align= "center">Dodawanie nowego wspólpracownika</h2>
				<br><br>
				<form class="form-horizontal" role="form" method="post" action="index.php">
					<div class="form-group">
						<label for="firma" class="col-sm-2 control-label">Nazwa firmy</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="firma" name="firma" placeholder="Wprowadź pełną nazwę firmy" value="">
							</div>
					</div>
					<br><br>
					<div class="form-group">
						<label for="imie" class="col-sm-2 control-label">Imię</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="imie" name="imie" placeholder="Wprowadź imię osoby kontaktowej" value="">
							</div>
					</div>
					<div class="form-group">
						<label for="nazw" class="col-sm-2 control-label">Nazwisko</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="nazw" name="nazw" placeholder="Wprowadź nazwisko osoby kontaktowej" value="">
							</div>
					</div>
					<div class="form-group">
						<label for="tel" class="col-sm-2 control-label">Telefon</label>
							<div class="col-sm-10">
								<input type="number" class="form-control" id="tel" name="tel" placeholder="Wprowadź numer telefonu osoby kontaktowej" value="">
							</div>
					</div>
					<div class="form-group">
						<label for="email" class="col-sm-2 control-label">Email</label>
						<div class="col-sm-10">
							<input type="email" class="form-control" id="email" name="email" placeholder="przykład@domena.com" value="">
						</div>
					</div>
					<br><br>
					
					<div class="form-group">
						<div class="col-sm-10 col-sm-offset-2">
							<span style="text-align:right">
								<input id="submit" name="submit" type="submit" value="Send" class="btn btn-primary btn-lg pull-right">
							</span>
							<div style="overflow: hidden; padding-right: .5em;">
								<div style="width:13%;" >
									<button onClick="location.href = 'index.php';" type="button" class="btn btn-primary btn-lg pull-right">Anuluj</button>
								</div>
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-sm-10 col-sm-offset-2"></div>
					</div>
				</form>
			</div>
		</div>
	</body>
</html>