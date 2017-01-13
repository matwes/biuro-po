<?php
$servername = "localhost";
$username = "root";
$password = "pass";

$conn = new mysqli($servername, $username, $password);

if($conn->connect_error){
  die("Polącznie nie wyszlo");
}

if(!$conn->query("USE biuro") === TRUE){
  die($conn->error);
}

if(!$conn->query("INSERT INTO wspolpracownik (Nazwa, Imie, Nazwisko, Telefon, Email, Login, Haslo) VALUES('LOT','Jan','Kowalski', '123456789', 'jan.kowalski@lot.pl', 'kowlot', 'letmein')") === TRUE){
  die($conn->error);
}

if(!$conn->query("INSERT INTO wspolpracownik (Nazwa, Imie, Nazwisko, Telefon, Email, Login, Haslo) VALUES('RYANAIR','Barry','Smith', '666666666', 'barry.smith@ryanair.com', 'airbar', 'letmetoo')") === TRUE){
  die($conn->error);
}

if(!$conn->query("INSERT INTO wspolpracownik (Nazwa, Imie, Nazwisko, Telefon, Email, Login, Haslo) VALUES('POLSKI BUS','Janusz','Kasiasty', '996213742', 'janusz.kasiasty@polskibus.pl', 'poljan', 'letmealso')") === TRUE){
  die($conn->error);
}

if(!$conn->query("INSERT INTO wspolpracownik (Nazwa, Imie, Nazwisko, Telefon, Email, Login, Haslo) VALUES('Marriot','Jose','Quacamole', '777444000', 'jose.quacamole@marriot.es', 'quajo', 'password')") === TRUE){
  die($conn->error);
}

if(!$conn->query("INSERT INTO wspolpracownik (Nazwa, Imie, Nazwisko, Telefon, Email, Login, Haslo) VALUES('Tipton','London','Tipton', '100000000', 'london.tipton@tipton.uk', 'princess', 'crown')") === TRUE){
  die($conn->error);
}
?>
