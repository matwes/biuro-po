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
		<title>Panel obsługi zapytań</title>

	</head>
	<body>
		<div class="container">
			<div class="jumbotron">
				<div class="row" style="width: 100%;">
				<h1 style="margin-top:0px;">Panel obsługi zapytań</h1>
					<div class="span6">
						<div class="nonboxy-widget">
							<div class="widget-head">
								<h3>Odpowiedzi na zapytania</h3>
							</div>
							<div class="widget-content" >
								<div class="widget-box" style="overflow-y:auto; height:500px;">
									<?php $funkcje->pobierzZapytania();?>
								</div>
							</div>
						</div>
					</div>
				</div>


	
				<br><br>
			</div><!--jumbotron-->
			<br><br>	
		</div><!--container-->
	</body>
</html>