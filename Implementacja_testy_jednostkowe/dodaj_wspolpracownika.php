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

$login = $funkcje->generujStringa(10);
$haslo = $funkcje->generujStringa(15);

if(!$conn->query("INSERT INTO wspolpracownik (Nazwa, Imie, Nazwisko, Telefon, Email, Login, Haslo) VALUES('{$_SESSION["firma"]}','{$_SESSION["imie"]}','{$_SESSION["nazw"]}', '{$_SESSION["tel"]}', '{$_SESSION["email"]}', '{$login}', '{$haslo}')") === TRUE){
  die($conn->error);
}
unset($_SESSION['firma']); 
unset($_SESSION['imie']);
unset($_SESSION['nazw']);
unset($_SESSION['tel']); 
unset($_SESSION['email']);

$lastID = $conn->insert_id;
print_r($lastID);
header("Location: profil.php?id={$lastID}");
?>
