<?php
require_once 'funkcje.php';

$funkcje = new Funkcje();

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

if(!$conn->query("INSERT INTO `zapytanie o nocleg` (Start, Koniec, Miejsca, Standard, `Cel podrozyID') VALUES('{$_SESSION["start"]}','{$_SESSION["end"]}','{$_SESSION["seats"]}', '{$_SESSION["rating"]}', '{$_SESSION["ctySelect"]}')") === TRUE){
  die($conn->error);
}
unset($_SESSION['start']); 
unset($_SESSION['end']);
unset($_SESSION['seats']);
unset($_SESSION['rating']); 
unset($_SESSION['ctySelect']);
unset($_SESSION['kraj']);


header("Location: panel.php");
?>
