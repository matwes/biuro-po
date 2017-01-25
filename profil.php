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
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script type="text/javascript">
            $(function() {
                $('#ctrSelect').change(function() {
                    var wybor = $(this).val();
                    $.ajax({
                        type: "POST",
                        url: "miasta.php",
                        data: {'theOption': wybor},
                        success: function(whatigot) {

                            $('#LaDIV').html(whatigot);
                        } 
                    }); 
                }); 
            });
        </script>
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
						<tbody style="height:110px;">
							<?php $funkcje->pobierzUslugi($id); ?>
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
								<label for="ctrSelect" class="col-sm-2 control-label">Kraj</label>
								<div class="col-sm-10">
									<select class="form-control" id="ctrSelect">
										<?php $funkcje->pobierzKraje(); ?>
									</select><br>
								</div>
								<div id="LaDIV"></div>
								<br><br><br>
								<label for="stars" class="col-sm-2 control-label" style="padding-top: 15px;">Standard</label><br>
								<div class="col-sm-10">
									<fieldset class="rating" id="stars">
										<input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
										<input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
										<input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
										<input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
										<input type="radio" id="star1" name="rating" value="1" checked="checked"/><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
									</fieldset>
								</div>
								<br><br>
							</div>
						</div>
						<div class="modal-footer">
							<div style="width:100%; margin: 0 auto;">
								<div style='float: left;'>
									<button id="anulujBtn" type="button" class="btn btn-primary btn-lg pull-right">Anuluj</button>
								</div>
								<div style='float: right;'>
									<button id="btn" class="btn btn-primary btn-lg pull-right">Dodaj usługę</button>
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
								<select class="form-control" id="locSelect">
									<option value="1">Samolot</option>
									<option value="2">Autobus</option>
									<option value="3">Statek</option>
								</select><br>
								<div id="seatsError" style="color: red;"></div>
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
									<button id="btn2" type="button" class="btn btn-primary btn-lg pull-right">Dodaj usługę</button>
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
		var modal = document.getElementById('myModal');
		var modal2 = document.getElementById('myModal2');

		var btn = document.getElementById("noclegBtn");
		var btn2 = document.getElementById("przyjazdBtn");
		var btn3 = document.getElementById("anulujBtn");
		var btn4 = document.getElementById("anulujBtn2");

		btn.onclick = function() {
			modal.style.display = "block";
				$.ajax({
					type: "POST",
					url: "miasta.php",
					data: {'theOption': $('#ctrSelect').val()},
					success: function(whatigot) {

						$('#LaDIV').html(whatigot);
						$('#btn').click(function() {
							
							var modal = document.getElementById('myModal');
							$.ajax({
								type: "POST",
								url: "dodaj_usluge.php",
								data: {'wspId': <?php echo $id; ?>, 'miasto': $('#ctySelect').val(), 'stand': $("#stars :radio:checked").val()},
								success: function(whatigot) {
										modal.style.display = "none";
										window.location.reload();											
							  }
							});
							
						});
					} 
				});
		}
		btn2.onclick = function() {
			modal2.style.display = "block";
				$('#btn2').click(function() {
					
					var modal2 = document.getElementById('myModal2');
					$.ajax({
						type: "POST",
						url: "dodaj_usluge2.php",
						data: {'wspId': <?php echo $id; ?>, 'lok': $('#locSelect').val(), 'seats': $("#seats").val()},
						success: function(whatigot) {
							if(whatigot.length>0)
								$('#seatsError').html(whatigot);
							else
							{
								modal.style.display = "none";
								window.location.reload();		
							}								
					  }
					});
					
				});
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