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
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	</head>
	<body>
		<div class="container">
			<a href="index.html">Powrót</a>
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
						<button type="button" class="btn btn-primary btn-lg" id="zapyt" style="margin: 25px -100px; position:relative; top:50%; left:50%;">Stwórz nowe zapytanie</button>
			</div>
		</div>
		
		<div id="myModal" class="modal">
			<div class="modal-content">
				<div class="modal-header">
					<h2>Komunikat</h2>
				</div>
				<div class="modal-body">
					 <p>Czy na pewno akceptujesz tę propozycję?</p>
				</div>
				<div id="test"></div>
				<div class="modal-footer">
					<div style="width:100%; margin: 0 auto;">
						<div style='float: left;'>
							<button id="anulujBtn" type="button" class="btn btn-primary btn-md pull-right">Anuluj</button>
						</div>
						<div style='float: right;'>
							<button id="akc" class="btn btn-primary btn-md pull-right">Zatwierdź</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div id="myModal2" class="modal">
			<div class="modal-content">
				<div class="modal-header">
					<h2>Stwórz nowe zapytanie o usługę:</h2>
					<div style="width: 70%; margin: 0 auto;">
						<button type="button" class="btn btn-primary btn-lg" style="margin: 10px;" onClick="location.href = 'formularz_przejazd.php';">Transportową</button>
						<button type="button" class="btn btn-primary btn-lg" style="margin: 10px;" onClick="location.href = 'formularz_nocleg.php';">Noclegową</button>
					</div>
				</div>
			</div>
		</div>
		
		<script>
			var modal = document.getElementById('myModal');
			var modal2 = document.getElementById('myModal2');
			var btn = document.getElementById("anulujBtn");
			var btn2 = document.getElementById("akc");
			var btn3 = document.getElementById("zapyt");
			var id = -1;
			var typ = -1;
			
			btn.onclick = function() {
				modal.style.display = "none";
			}


			function akceptuj($typ, $id)
			{ 
				id = $id;
				typ = $typ;
				modal.style.display = "block";
			}
		
			btn2.onclick = function()
			{
				$.ajax({
					type: "POST",
					url: "akceptuj_prop.php",
					data: {'typ': typ, 'id': id},
					success: function(whatigot) {
						modal.style.display = "none";
						window.location.reload();
				  }
				});
			}
			
			btn3.onclick = function()
			{
				modal2.style.display = "block";
			}


			window.onclick = function(event)
			{
				if (event.target == modal) {
					modal.style.display = "none";
				}
				if (event.target == modal2) {
					modal2.style.display = "none";
					
				}
			
			}
		</script>
	</body>
</html>