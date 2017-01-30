<?php

require_once 'funkcje.php';

$funkcje = new Funkcje();
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

?>
<!DOCTYPE html>
<html lang ="pl">
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<meta charset="utf-8">
		<title>Tworzenie nowego zapytania:</title>
	</head>
	<body>

		<div class="container">
			<div class="jumbotron">
				<h2 align="center">Wprowadzone dane:</h2>
				<br/><br/>
				
				<div class="row" style="width: 50%; margin:0 auto;">
					<div class = 'form-horizontal well'>
						<fieldset>
							<div class="form-horizontal">
								<div>
									<label for="kraj" class="col-sm-4 control-label">Wybrany kraj</label>
									<div class="col-sm-8">
										<p class="nowyWsp" id="kraj" name="kraj"><?php echo $funkcje->pobierzKraj($_SESSION["kraj"])?></p>
									</div>
									
									<label for="miasto" class="col-sm-4 control-label">Miasto</label>
									<div class="col-sm-8">
										<p class="nowyWsp" id="miasto" name="miasto"><?php echo $funkcje->pobierzMiasto($_SESSION["ctySelect"])?></p>
									</div>
									<label for="rating" class="col-sm-4 control-label">Standard</label>
									<div class="col-sm-8">
										<p class="nowyWsp" id="rating" name="rating">
											<?php
												if($_SESSION["type"]==1)
													echo $_SESSION["rating"]."-gwiazdkowy";
												else if($_SESSION["type"]==2)
												{
													$lok = "";
													switch ($_SESSION["rating"]) {
														case 1:
															$lok = 'Samolot';
															break;
														case 2:
															$lok = 'Autobus';
															break;
														case 3:
															$lok = 'Statek';
															break;
													}
													echo $lok;
												}
											?>
										</p>
									</div>
									<label for="seats" class="col-sm-4 control-label">Liczba miejsc</label>
									<div class="col-sm-8">
										<p class="nowyWsp" id="seats" name="seats""><?php echo $_SESSION["seats"] ?></p>
									</div>
									<label for="start" class="col-sm-4 control-label">Data wyjazdu</label>
									<div class="col-sm-8">
										<p class="nowyWsp" id="start" name="start"><?php echo $_SESSION["start"] ?></p>
									</div>
									<label for="end" class="col-sm-4 control-label">Data powrotu</label>
									<div class="col-sm-8">
										<p class="nowyWsp" id="end" name="end"><?php echo $_SESSION["end"] ?></p>
									</div>
								</div>
							</div>
						</fieldset>
					</div>
				</div>
									
				<div style="width:90%; margin: 0 auto;">
					<h5 align="center">Zatwierdź poprawność danych</h5><br>
						<div class='test'>
							<div style='float: left;'>
								<button onclick="location.href = '<?php
												if($_SESSION["type"]==1)
													echo "formularz_nocleg.php";
												else if($_SESSION["type"]==2)
												{
													echo "formularz_przejazd.php";
												}
											?> ';" type="button" class="btn btn-primary btn-lg pull-right">Wróc i popraw</button>
							</div>
							<div style='float: right;'>
								<button onClick="location.href = 'dodaj_zapytanie.php'" type="button" class="btn btn-primary btn-lg pull-right">Zatwierdź</button>
							</div>
						</div>
				</div>
			</div>
		</div>
	</body>
</html>
