<?php

require_once 'funkcje.php';

$funkcje = new Funkcje();

   if(isset($_GET["id"])){
	 $id = $_GET["id"];
   }

	$nazwa = $funkcje->pobierzDane($id, 'Nazwa');
	$imie = $funkcje->pobierzDane($id, 'Imie');
	$nazwisko = $funkcje->pobierzDane($id, 'Nazwisko');
	$telefon = $funkcje->pobierzDane($id, 'Telefon');
	$email = $funkcje->pobierzDane($id, 'Email');
	
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
				<div class="row" style="width: 80%;">
				<h1 style="margin-top:0px;"><?php echo $nazwa ?></h1>
					<div class="span6">
						<div class="nonboxy-widget">
							<div class="widget-head">
								<h3>Dane osoby kontaktowej</h3>
							</div>
							<div class="widget-content">
								<div class="widget-box">
									<div class = 'form-horizontal well'>
										<fieldset>
											<div class="control-group">
												<div>
													<label for="imie" class="col-sm-2 control-label">Imię</label>
														<div class="col-sm-10">
															<p class="nowyWsp"><?php echo $imie ?></p>
														</div>
												</div>
												<div>
													<label for="nazw" class="col-sm-2 control-label">Nazwisko</label>
														<div class="col-sm-10">
															<p class="nowyWsp"><?php echo $nazwisko ?></p>
														</div>
												</div>
												<div>
													<label for="tel" class="col-sm-2 control-label">Telefon</label>
														<div class="col-sm-10">
															<p class="nowyWsp"><?php echo $telefon ?></p>
														</div>
												</div>
												<div>
													<label for="email" class="col-sm-2 control-label">Email</label>
													<div class="col-sm-10">
														<p class="nowyWsp"><?php echo $email ?></p>
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
								<td style="width:80%;"><a class="nazwyF" href="#">Hotel Marigold</a></td>
								<td style="width:20%;"><span class="nazwyF">Hotelowa</span></td>
							</tr>
							<tr>
								<td style="width:80%;"><a class="nazwyF" href="#">Hotel Marigold</a></td>
								<td style="width:20%;"><span class="nazwyF">Hotelowa</span></td>
							</tr>
							<tr>
								<td style="width:80%;"><a class="nazwyF" href="#">Hotel Marigold</a></td>
								<td style="width:20%;"><span class="nazwyF">Hotelowa</span></td>
							</tr>
						</tbody>
					</table>
					
					<div style="width:100%; margin: 0 auto;">
						<div style='float: left;'>
							<button onClick="location.href = 'index.php';" type="button" class="btn btn-primary btn-lg pull-right">Powrót do listy współpracowników</button>
						</div>
						<div style='float: right;'>
							<ul class="nav navbar-nav" >
								<li class="root">
									<button type="button" class="btn btn-primary btn-lg pull-right">Dodaj usługę</button>
									<ul class="dropdown-menu" style="min-width: 140px;">
										<li><input type="Button" id="noclegBtn" class="btn btn-default" style="width:97%; margin: 2px;" value="Nocleg" /></li>
										<li><input type="Button" id="przyjazdBtn" class="btn btn-default" style="width:97%; margin: 2px;" value="Przejazd" /></li>
									</ul>
								</li>
							</ul>
						</div>
					</div>
				</div>

				<!-- The Modal -->
				<div id="myModal" class="modal">
				  <!-- Modal content -->
					<div class="modal-content">
						<div class="modal-header">
							<h2>Dodawanie usługi noclegowej</h2>
						</div>
						<div class="modal-body">
							 <div class="form-group">
								<label for="sel1">Kraj:</label>
								<select class="form-control" id="sel1">
									<option>Francja</option>
									<option>Gruzja</option>
									<option>Azerbejdżan</option>
									<option>Estonia</option>
								</select><br>
								<label for="sel2">Miasto:</label>
								<select class="form-control" id="sel1">
									<option>Paryż</option>
									<option>Marsylia</option>
									<option>La Baule</option>
									<option>Angers</option>
								</select>
								<br><label for="stars">Standard:</label><br>
								<fieldset class="rating" id="stars">
									<input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
									<input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
									<input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
									<input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
									<input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
								</fieldset><br>
							</div>
						</div>
						<div class="modal-footer">
							<div style="width:100%; margin: 0 auto;">
								<div style='float: left;'>
									<button id="anulujBtn" type="button" class="btn btn-primary btn-lg pull-right">Anuluj</button>
								</div>
								<div style='float: right;'>
									<button type="button" class="btn btn-primary btn-lg pull-right">Dodaj usługę</button>
								</div>
							</div>
						</div>
					</div>

				</div>

				<div id="myModal2" class="modal">
				  <!-- Modal content -->
					<div class="modal-content">
						<div class="modal-header">
							<h2>Dodawanie przejazdu</h2>
						</div>
						<div class="modal-body">
							<div class="form-group">
								<label for="sel1">Typ środka lokomocji:</label>
								<select class="form-control" id="sel1">
									<option>Samolot</option>
									<option>Autobus</option>
									<option>Statek</option>
								</select><br>
								<label for="seats">Dostępna liczba miejsc:</label>
								<input type="text" class="form-control bfh-number" id="seats">
							</div>
						</div>
						<div class="modal-footer">
							<div style="width:100%; margin: 0 auto;">
								<div style='float: left;'>
									<button id="anulujBtn2" type="button" class="btn btn-primary btn-lg pull-right">Anuluj</button>
								</div>
								<div style='float: right;'>
									<button type="button" class="btn btn-primary btn-lg pull-right">Dodaj usługę</button>
								</div>
							</div>
						</div>
					</div>

				</div>	
				<br><br>
			</div><!--jumbotron-->
			<br><br>
		</div><!--container-->

		<script>
		// Get the modal
		var modal = document.getElementById('myModal');
		var modal2 = document.getElementById('myModal2');

		// Get the button that opens the modal
		var btn = document.getElementById("noclegBtn");
		var btn2 = document.getElementById("przyjazdBtn");
		var btn3 = document.getElementById("anulujBtn");
		var btn4 = document.getElementById("anulujBtn2");

		// When the user clicks the button, open the modal 
		btn.onclick = function() {
			modal.style.display = "block";
		}
		btn2.onclick = function() {
			modal2.style.display = "block";
		}
		btn3.onclick = function() {
			modal.style.display = "none";
		}
		btn4.onclick = function() {
			modal2.style.display = "none";
		}

		// When the user clicks anywhere outside of the modal, close it
		window.onclick = function(event) {
			if (event.target == modal) {
				modal.style.display = "none";
			}
			if (event.target == modal2) {
				modal.style.display = "none";
			}
			
		}
		</script>
		
		
	</body>
</html>