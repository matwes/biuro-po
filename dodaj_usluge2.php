<?php
	$wspId = $_POST['wspId'];
	$lok = $_POST['lok'];
	$seats = intval($_POST['seats']);
	/*echo "<h1>{$wspId}</h1>";
	echo "<h1>{$lok}</h1>";
	echo "<h1>{$seats}</h1>";*/
	
	if($seats>0)
	{
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

		if(!$conn->query("INSERT INTO `usluga przejazd` (Typ, Miejsca, WspolpracownikID) VALUES('{$lok}','{$seats}','{$wspId} ')") === TRUE){
		  die($conn->error);
		}
	}
	else
		echo "Wprowadź liczbę większą od zera!";
?>