<?php
$servername = "localhost";
$username = "root";
$password = "pass";

$conn = new mysqli($servername, $username, $password);

if($conn->connect_error){
  die("Polącznie nie wyszlo");
}

if(!$conn->query("DROP DATABASE IF EXISTS biuro") === TRUE){
  die($conn->error);
}?>
