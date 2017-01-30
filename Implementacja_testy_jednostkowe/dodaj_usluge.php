<?php
	$wspId = $_POST['wspId'];
	$miasto = $_POST['miasto'];
	$stand = $_POST['stand'];
	//echo "<h1>{$wspId}</h1>";
	//echo "<h1>{$miasto}</h1>";
	//echo "<h1>{$stand}</h1>";

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

	if(!$conn->query("INSERT INTO `usluga nocleg` (Standard, `Cel podrozyID`, WspolpracownikID) VALUES('{$stand}','{$miasto}','{$wspId} ')") === TRUE){
	  die($conn->error);
	}
?>