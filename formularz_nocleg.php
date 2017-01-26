<?php

require_once 'funkcje.php';
ob_start();
$funkcje = new Funkcje();
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang ="pl">
	<head>
		<meta charset="utf-8">
		<title>Dodawanie nowego zapytania o usługę noclegową</title>
		
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
		<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.min.css" rel="stylesheet"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>	
		<script type="text/javascript">
            $(function() {
                $('#kraj').change(function funkcja() {
                    var wybor = $(this).val();
                    $.ajax({
                        type: "POST",
                        url: "miasta.php",
                        data: {'theOption': wybor},
                        success: function(whatigot) {
                            $('#miasta').html(whatigot);
                        } 
                    }); 
                });				
            });
			
        </script>		
	</head>

	<body onload="codeAddress();">
		<div class="container">
			<div class="jumbotron" style="padding: 70px;">
				<h2 align= "center">Dodawanie nowego zapytania o usługę noclegową</h2>
				<br><br>
				<form class="form-horizontal" role="form" method="post" action="formularz_nocleg.php" style="width:70%; margin: 0 auto;">
					<div class="form-group">
					
						<label for="kraj" class="col-sm-2 control-label">Kraj</label>
						<div class="col-sm-10">
							<select class="form-control" id="kraj" name="kraj" required>
								<option disabled selected value>Wybierz kraj</option>
								<?php echo $funkcje->generujListeKrajow() ?>
							 </select> <br>
						</div>
						
						<div id="miasta">
						</div>
						
						<label for="stars" class="col-sm-2 control-label" style="padding-top: 15px;">Standard</label><br>
						<div class="col-sm-10">
							<fieldset class="rating" id="stars" name="stars">
								<input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
								<input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
								<input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
								<input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
								<input type="radio" id="star1" name="rating" value="1" checked="checked"/><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
							</fieldset>
						</div>
						
						<label for="seats" class="col-sm-2 control-label">Liczba miejsc</label>
						<div class="col-sm-10">
							<input type="number" class="form-control bfh-number" id="seats" name="seats" required pattern= "[0-9]" min="0" 
							value="<?php echo $funkcje->zczytajWartosc($_POST, $_SESSION, "seats")?>"><br><br>
						</div>
						<label for="start" class="col-sm-2 control-label">Data wyjazdu</label>
						<div class="col-sm-4" id="datawyjazdu">
							<input class="form-control" data-provide="datepicker" id="start" name="start" required value="<?php echo $funkcje->zczytajWartosc($_POST, $_SESSION, "start")?>">
						</div>
						
						<label for="end" class="col-sm-2 control-label" id="datapowrotu">Data powrotu</label>
						<div class="col-sm-4">
							<input class="form-control" data-provide="datepicker" id="end" name="end" required value="<?php echo $funkcje->zczytajWartosc($_POST, $_SESSION, "end")?>">
						</div>	
					</div>
					<br>
					
					
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
		
		
		<?php
		if(isset($_POST["submit"]))
		{
			if (session_status() == PHP_SESSION_NONE) {
					 session_start();
		   }
			$_SESSION["kraj"] = $funkcje->zczytajWartosc($_POST, $_SESSION, "kraj"); 
			$_SESSION["ctySelect"] = $funkcje->zczytajWartosc($_POST, $_SESSION, "ctySelect"); 
			$_SESSION["rating"] = $funkcje->zczytajWartosc($_POST, $_SESSION, "rating"); 
			$_SESSION["seats"] = $funkcje->zczytajWartosc($_POST, $_SESSION, "seats"); 
			$_SESSION["start"] = $funkcje->zczytajWartosc($_POST, $_SESSION, "start"); 
			$_SESSION["end"] = $funkcje->zczytajWartosc($_POST, $_SESSION, "end");
			$_SESSION["type"] =	1;				
			
			$wyjazd = date('Y-m-d', strtotime($_POST['start']));
			$powrot = date('Y-m-d', strtotime($_POST['end']));
			if($wyjazd > 	$powrot){
				$message = "Data wyjazdu nie może być wcześniejsza od daty powrotu!";
				echo "<script type='text/javascript'>alert('$message');</script>";
			}
			else
			{
				//print_r($_SESSION);
				header("Location:zapytanie.php");
				exit();
			}
	    }?>
	</body>
</html>


