<?php
    $typ = $_POST['typ'];
	$id = $_POST['id'];
	
    $servername = "localhost";
	$username = "root";
	$password = "pass";

	$conn = new mysqli($servername, $username, $password, "biuro");
	if($conn->connect_error){
	  die("Polącznie nie wyszlo");
	}

	if(!$conn->query("USE biuro") === TRUE){
	  die($conn->error);
	}

	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}

	if($typ==1)
	{
		
		if(!$conn->query("UPDATE `zapytanie o nocleg_wspolpracownik` SET `Data`= NULL WHERE `ID`={$id}") === TRUE){
		  die($conn->error);
		}
	}
	else
		if($typ==2)
		{
			if(!$conn->query("UPDATE `wspolpracownik_ zapytanie o przejazd` SET `Data`= NULL WHERE `ID`={$id}") === TRUE){
		  die($conn->error);
		}
		}
			
	?>