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
		<title>Dodawanie nowego zapytania o usługę noclegową</title>
	</head>

	<body>
		<div class="container">
			<div class="jumbotron" style="padding: 70px;">
				<h2 align= "center">Dodawanie nowego zapytania o usługę noclegową</h2>
				<br><br>
				<form class="form-horizontal" role="form" method="post" action="Form.php">
					<div class="form-group">
						<label for="firma" class="col-sm-2 control-label">Kraj</label>
							<div class="col-sm-10">
								<select class="form-control" id="kraj" name="kraj">
                                                                  <?php echo $funkcje->generujListeKrajow() ?>
                                                                </select>
							</div>
					</div>
					<br><br>
					
					
					<div style="width:90%; margin: 0 auto;">
						<div class='test'>
							<div style='float: left;'>
								<button onClick="location.href = 'panel.php';" type="button" class="btn btn-primary btn-lg pull-right">Anuluj</button>
							</div>
							<div style='float: right;'>
								<input id="submit" name="submit" type="submit" value="Dodaj" class="btn btn-primary btn-lg pull-right">
							</div>
						</div>
					</div>
					
				</form>
			</div>
		</div>
	</body>
</html>
