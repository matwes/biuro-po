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
		<title>Profil współpracownika</title>
	</head>
	<body>
		<div class="container">
			<div class="jumbotron">
			

				<div class="row" style="width: 70%;">
					<div class="span6">
						<div class="nonboxy-widget">
							<div class="widget-head">
								<h3>Profil współpracownika</h3>
							</div>
							<div class="widget-content">
								<div class="widget-box">
									<div class = 'form-horizontal well'>
										<fieldset>
											<div class="control-group">
												<div>
													<label for="firma" class="col-sm-2 control-label">Nazwa firmy</label>
														<div class="col-sm-10">
															<p class="nowyWsp">Jakas nazwa</p>
														</div>
												</div>
												<br>
												<div>
													<label for="imie" class="col-sm-2 control-label">Imię</label>
														<div class="col-sm-10">
															<p class="nowyWsp">Patryk</p>
														</div>
												</div>
												<div>
													<label for="nazw" class="col-sm-2 control-label">Nazwisko</label>
														<div class="col-sm-10">
															<p class="nowyWsp">Kowalski</p>
														</div>
												</div>
												<div>
													<label for="tel" class="col-sm-2 control-label">Telefon</label>
														<div class="col-sm-10">
															<p class="nowyWsp">456678569</p>
														</div>
												</div>
												<div>
													<label for="email" class="col-sm-2 control-label">Email</label>
													<div class="col-sm-10">
														<p class="nowyWsp">patryk.k@hmail.com</p>
													</div>
												</div>
											</div>
										</fieldset>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			
				<div class="form-horizontal" style="margin-left: -15px; margin-rigt:-15px">
					
					
					<h3>Usługi współpracownika</h3>
					
					<table class="table table-striped">
						<thead >
							<tr>
								<th style="width:80%;">Nazwa usługi</th>
								<th style="width:20%;">Typ usługi</th>
							</tr>
						</thead>
						<tbody style="height:120px;">
							<tr>
								<td style="width:80%;">Hotel Marigold</td>
								<td style="width:20%;">Hotelowa</td>
							</tr>
							<tr>
								<td style="width:80%;">Hotel Marigold</td>
								<td style="width:20%;">Hotelowa</td>
							</tr>
							<tr>
								<td style="width:80%;">Hotel Marigold</td>
								<td style="width:20%;">Hotelowa</td>
							</tr>
						</tbody>
				</table>
					
					<div style="width:100%; margin: 0 auto;">
						<div style='float: left;'>
							<button onClick="#" type="button" class="btn btn-primary btn-lg pull-right">Powrót do listy współpracowników</button>
						</div>
						<div style='float: right;'>
							<ul class="nav navbar-nav" >
								<li class="root">
									<button type="button" class="btn btn-primary btn-lg pull-right">Dodaj usługę</button>
									<ul class="dropdown-menu" style="min-width: 140px;">
										<li><a href="#">Nocleg</a></li>
										<li> <a tabindex="-1" href="#">Przejazd</a></li>
									</ul>
								</li>
							</ul>
						</div>
					</div>
				</div><br/><br/>
			</div>
			<br/><br/>
		</div>

	</body>
	
</html>