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


#Dodawanie krajów
if(!$conn->query("INSERT INTO kraj (Nazwa) VALUES('Francja')") === TRUE){
  die($conn->error);
}

if(!$conn->query("INSERT INTO kraj (Nazwa) VALUES('Niemcy')") === TRUE){
  die($conn->error);
}


#Dodawanie celów podróży
if(!$conn->query("INSERT INTO `cel podrozy` (Miasto, KrajID) VALUES('Berlin', (SELECT ID from kraj WHERE Nazwa='Niemcy'))") === TRUE){
  die($conn->error);
}

if(!$conn->query("INSERT INTO `cel podrozy` (Miasto, KrajID) VALUES('Hanburg', (SELECT ID from kraj WHERE Nazwa='Niemcy'))") === TRUE){
  die($conn->error);
}

if(!$conn->query("INSERT INTO `cel podrozy` (Miasto, KrajID) VALUES('Essen', (SELECT ID from kraj WHERE Nazwa='Niemcy'))") === TRUE){
  die($conn->error);
}

if(!$conn->query("INSERT INTO `cel podrozy` (Miasto, KrajID) VALUES('Drezno', (SELECT ID from kraj WHERE Nazwa='Niemcy'))") === TRUE){
  die($conn->error);
}

if(!$conn->query("INSERT INTO `cel podrozy` (Miasto, KrajID) VALUES('Paryż', (SELECT ID from kraj WHERE Nazwa='Francja'))") === TRUE){
  die($conn->error);
}

if(!$conn->query("INSERT INTO `cel podrozy` (Miasto, KrajID) VALUES('Awinion', (SELECT ID from kraj WHERE Nazwa='Francja'))") === TRUE){
  die($conn->error);
}

if(!$conn->query("INSERT INTO `cel podrozy` (Miasto, KrajID) VALUES('Cannes', (SELECT ID from kraj WHERE Nazwa='Francja'))") === TRUE){
  die($conn->error);
}

if(!$conn->query("INSERT INTO `cel podrozy` (Miasto, KrajID) VALUES('Strasburg', (SELECT ID from kraj WHERE Nazwa='Francja'))") === TRUE){
  die($conn->error);
}

#Dodawanie usług noclegowych
if(!$conn->query("INSERT INTO `usluga nocleg` (Standard, `Cel podrozyID`, WspolpracownikID) VALUES('4','1','4')") === TRUE){
  die($conn->error);
}

if(!$conn->query("INSERT INTO `usluga nocleg` (Standard, `Cel podrozyID`, WspolpracownikID) VALUES('5','1','4')") === TRUE){
  die($conn->error);
}

if(!$conn->query("INSERT INTO `usluga nocleg` (Standard, `Cel podrozyID`, WspolpracownikID) VALUES('5','2','4')") === TRUE){
  die($conn->error);
}

if(!$conn->query("INSERT INTO `usluga nocleg` (Standard, `Cel podrozyID`, WspolpracownikID) VALUES('3','5','5')") === TRUE){
  die($conn->error);
}

if(!$conn->query("INSERT INTO `usluga nocleg` (Standard, `Cel podrozyID`, WspolpracownikID) VALUES('4','5','5')") === TRUE){
  die($conn->error);
}

if(!$conn->query("INSERT INTO `usluga nocleg` (Standard, `Cel podrozyID`, WspolpracownikID) VALUES('4','6','5')") === TRUE){
  die($conn->error);
}

#Dodawanie uslug przewoznikow
#Typy 1-samolot, 2-autobus, 3-pociąg
if(!$conn->query("INSERT INTO `usluga przejazd` (Typ, Miejsca, WspolpracownikID) VALUES('1', '55', '1')") === TRUE){
  die($conn->error);
}

if(!$conn->query("INSERT INTO `usluga przejazd` (Typ, Miejsca, WspolpracownikID) VALUES('1', '66', '1')") === TRUE){
  die($conn->error);
}

if(!$conn->query("INSERT INTO `usluga przejazd` (Typ, Miejsca, WspolpracownikID) VALUES('1', '77', '1')") === TRUE){
  die($conn->error);
}

if(!$conn->query("INSERT INTO `usluga przejazd` (Typ, Miejsca, WspolpracownikID) VALUES('2', '55', '3')") === TRUE){
  die($conn->error);
}

if(!$conn->query("INSERT INTO `usluga przejazd` (Typ, Miejsca, WspolpracownikID) VALUES('2', '44', '3')") === TRUE){
  die($conn->error);
}

if(!$conn->query("INSERT INTO `usluga przejazd` (Typ, Miejsca, WspolpracownikID) VALUES('2', '33', '3')") === TRUE){
  die($conn->error);
}

if(!$conn->query("INSERT INTO `usluga przejazd` (Typ, Miejsca, WspolpracownikID) VALUES('1', '88', '2')") === TRUE){
  die($conn->error);
}
?>
