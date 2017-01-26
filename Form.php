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
		<title>Dodawanie nowego wspólpracownika</title>
	</head>

	<body>
		<div class="container">
			<div class="jumbotron" style="padding: 70px;">
				<h2 align= "center">Dodawanie nowego wspólpracownika</h2>
				<br><br>
				<form class="form-horizontal" role="form" method="post" action="Form.php">
					<div class="form-group">
						<label for="firma" class="col-sm-2 control-label">Nazwa firmy</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="firma" name="firma" placeholder="Wprowadź pełną nazwę firmy" value="<?php echo $funkcje->zczytajWartosc($_POST, $_SESSION, "firma")?>" required>
							</div>
					</div>
					<br><br>
					<div class="form-group">
						<label for="imie" class="col-sm-2 control-label">Imię</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="imie" name="imie" placeholder="Wprowadź imię osoby kontaktowej" value="<?php echo $funkcje->zczytajWartosc($_POST, $_SESSION, "imie")?>" pattern="[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ]{2}[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ\x20]*(-[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ\x20]*[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ]{2}){0,1}" required>
							</div>
					</div>
					<div class="form-group">
						<label for="nazw" class="col-sm-2 control-label">Nazwisko</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="nazw" name="nazw" placeholder="Wprowadź nazwisko osoby kontaktowej" value="<?php echo $funkcje->zczytajWartosc($_POST, $_SESSION, "nazw")?>"  pattern="[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ]{2}[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ\x20]*(-[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ\x20]*[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ]{2}){0,1}" required>
							</div>
					</div>
					<div class="form-group">
						<label for="tel" class="col-sm-2 control-label">Telefon</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="tel" name="tel" placeholder="Wprowadź numer telefonu osoby kontaktowej" value="<?php echo $funkcje->zczytajWartosc($_POST, $_SESSION, "tel")?>" pattern="[0-9+-\(\)]*" required>
							</div>
					</div>
					<div class="form-group">
						<label for="email" class="col-sm-2 control-label">Email</label>
						<div class="col-sm-10">
							<input type="email" class="form-control" id="email" name="email" placeholder="przykład@domena.com" value="<?php echo $funkcje->zczytajWartosc($_POST, $_SESSION, "email")?>" required>
						</div>
					</div>
					<br><br>
					
					
					<div style="width:90%; margin: 0 auto;">
						<div class='test'>
							<div style='float: left;'>
								<button onClick="location.href = 'wspolpracownicy.php';" type="button" class="btn btn-primary btn-lg pull-right">Anuluj</button>
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
           if(isset($_POST["submit"])){
             $message = $funkcje->sprawdzCzyWBazie($_POST);
	     if($message == ""){
	     if (session_status() == PHP_SESSION_NONE) {
                 session_start();
               }
	       $_SESSION["firma"] = $funkcje->zczytajWartosc($_POST, $_SESSION, "firma"); 
	       $_SESSION["imie"] = $funkcje->zczytajWartosc($_POST, $_SESSION, "imie"); 
	       $_SESSION["nazw"] = $funkcje->zczytajWartosc($_POST, $_SESSION, "nazw"); 
	       $_SESSION["tel"] = $funkcje->zczytajWartosc($_POST, $_SESSION, "tel"); 
	       $_SESSION["email"] = $funkcje->zczytajWartosc($_POST, $_SESSION, "email"); 
               header("Location: nowyWsp.php");
	       exit;
	       #print_r($_SESSION);
	     }
	     else{
               echo "<script type='text/javascript'>alert('$message');</script>";
             }
	   }

	?>
	</body>
</html>
