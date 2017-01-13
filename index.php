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
		<title>Lista współpracowników</title>
	</head>

	<body>
		<div class="container">
			<div class="jumbotron" style="padding: 70px;">
				<h2 align="center">Lista współpracowników</h2>
				<br><br>
				<table class="table table-striped">
					<thead><tr><th>Nazwa firmy</th></tr></thead>
					<tbody><?php $funkcje->pobierzWspolpracownikow();?></tbody>
				</table>
				
				<span style="text-align:right">
					<button onClick="location.href = 'Form.php';" type="button" class="btn btn-primary btn-lg pull-right">Dodaj nowego współpracownika</button>
				</span>	
				
				<div style="overflow: hidden; padding-right: .5em;">
					<div class="input-group stylish-input-group">
						<input type="text" class="form-control"  placeholder="Search" >
						<span class="input-group-addon">
							<button type="submit">
								<span class="glyphicon glyphicon-search"></span>
							</button>  
						</span>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>