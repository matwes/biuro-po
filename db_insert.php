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

if(!$conn->query("INSERT INTO wspolpracownik (Nazwa, Imie, Nazwisko, Telefon, Email, Login, Haslo) VALUES('Ibis','Abis','Annubis', '987654321', 'abis.annubis@ibis.eg', 'ibiabi', 'piramith')") === TRUE){
  die($conn->error);
}

#Dodawanie krajów
if(!$conn->query("INSERT INTO kraj (Nazwa) VALUES('Francja')") === TRUE){
  die($conn->error);
}

if(!$conn->query("INSERT INTO kraj (Nazwa) VALUES('Niemcy')") === TRUE){
  die($conn->error);
}

if(!$conn->query("INSERT INTO kraj (Nazwa) VALUES('Chorwacja')") === TRUE){
  die($conn->error);
}

if(!$conn->query("INSERT INTO kraj (Nazwa) VALUES('Norwegia')") === TRUE){
  die($conn->error);
}

if(!$conn->query("INSERT INTO kraj (Nazwa) VALUES('Rosja')") === TRUE){
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

if(!$conn->query("INSERT INTO `cel podrozy` (Miasto, KrajID) VALUES('Dubrownik', (SELECT ID from kraj WHERE Nazwa='Chorwacja'))") === TRUE){
  die($conn->error);
}

if(!$conn->query("INSERT INTO `cel podrozy` (Miasto, KrajID) VALUES('Makarska', (SELECT ID from kraj WHERE Nazwa='Chorwacja'))") === TRUE){
  die($conn->error);
}

if(!$conn->query("INSERT INTO `cel podrozy` (Miasto, KrajID) VALUES('Split', (SELECT ID from kraj WHERE Nazwa='Chorwacja'))") === TRUE){
  die($conn->error);
}

if(!$conn->query("INSERT INTO `cel podrozy` (Miasto, KrajID) VALUES('Rowinji', (SELECT ID from kraj WHERE Nazwa='Chorwacja'))") === TRUE){
  die($conn->error);
}

if(!$conn->query("INSERT INTO `cel podrozy` (Miasto, KrajID) VALUES('Oslo', (SELECT ID from kraj WHERE Nazwa='Norwegia'))") === TRUE){
  die($conn->error);
}

if(!$conn->query("INSERT INTO `cel podrozy` (Miasto, KrajID) VALUES('Bergen', (SELECT ID from kraj WHERE Nazwa='Norwegia'))") === TRUE){
  die($conn->error);
}

if(!$conn->query("INSERT INTO `cel podrozy` (Miasto, KrajID) VALUES('Stavanger', (SELECT ID from kraj WHERE Nazwa='Norwegia'))") === TRUE){
  die($conn->error);
}

if(!$conn->query("INSERT INTO `cel podrozy` (Miasto, KrajID) VALUES('Trondheim', (SELECT ID from kraj WHERE Nazwa='Norwegia'))") === TRUE){
  die($conn->error);
}

if(!$conn->query("INSERT INTO `cel podrozy` (Miasto, KrajID) VALUES('Moskwa', (SELECT ID from kraj WHERE Nazwa='Rosja'))") === TRUE){
  die($conn->error);
}

if(!$conn->query("INSERT INTO `cel podrozy` (Miasto, KrajID) VALUES('Norilsk', (SELECT ID from kraj WHERE Nazwa='Rosja'))") === TRUE){
  die($conn->error);
}

if(!$conn->query("INSERT INTO `cel podrozy` (Miasto, KrajID) VALUES('Yaroslavl', (SELECT ID from kraj WHERE Nazwa='Rosja'))") === TRUE){
  die($conn->error);
}

if(!$conn->query("INSERT INTO `cel podrozy` (Miasto, KrajID) VALUES('Kazan', (SELECT ID from kraj WHERE Nazwa='Rosja'))") === TRUE){
  die($conn->error);
}

#Dodawanie usług noclegowych
if(!$conn->query("INSERT INTO `usluga nocleg` (Standard, `Cel podrozyID`, WspolpracownikID) VALUES('4','1','4')") === TRUE){
  die($conn->error);
}
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

if(!$conn->query("INSERT INTO `usluga nocleg` (Standard, `Cel podrozyID`, WspolpracownikID) VALUES('4','1','5')") === TRUE){
  die($conn->error);
}

if(!$conn->query("INSERT INTO `usluga nocleg` (Standard, `Cel podrozyID`, WspolpracownikID) VALUES('3','1','4')") === TRUE){
  die($conn->error);
}

if(!$conn->query("INSERT INTO `usluga nocleg` (Standard, `Cel podrozyID`, WspolpracownikID) VALUES('3','1','4')") === TRUE){
  die($conn->error);
}

if(!$conn->query("INSERT INTO `usluga nocleg` (Standard, `Cel podrozyID`, WspolpracownikID) VALUES('5','1','6')") === TRUE){
  die($conn->error);
}

if(!$conn->query("INSERT INTO `usluga nocleg` (Standard, `Cel podrozyID`, WspolpracownikID) VALUES('4','5','6')") === TRUE){
  die($conn->error);
}

if(!$conn->query("INSERT INTO `usluga nocleg` (Standard, `Cel podrozyID`, WspolpracownikID) VALUES('4','5','6')") === TRUE){
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

#Dodawanie zapytań
if(!$conn->query("INSERT INTO `zapytanie o nocleg` (Start, Koniec, Miejsca, Standard, `Cel podrozyID`) VALUES(DATE '2016-04-10', DATE '2016-04-20', '30', '4', '1')") === TRUE){
  die($conn->error);
}

if(!$conn->query("INSERT INTO `zapytanie o nocleg` (Start, Koniec, Miejsca, Standard, `Cel podrozyID`) VALUES(DATE '2016-04-10', DATE '2016-04-20', '30', '5', '1')") === TRUE){
  die($conn->error);
}

if(!$conn->query("INSERT INTO `zapytanie o nocleg` (Start, Koniec, Miejsca, Standard, `Cel podrozyID`) VALUES(DATE '2016-04-10', DATE '2016-04-20', '30', '4', '5')") === TRUE){
  die($conn->error);
}


if(!$conn->query("INSERT INTO `zapytanie o przejazd` (Start, Koniec, Miejsca, Typ, `Cel podrozyID`) VALUES(DATE '2016-04-10', DATE '2016-04-20', '30', '1', '1')") === TRUE){
  die($conn->error);
}

if(!$conn->query("INSERT INTO `zapytanie o przejazd` (Start, Koniec, Miejsca, Typ, `Cel podrozyID`) VALUES(DATE '2016-04-10', DATE '2016-04-20', '30', '2', '5')") === TRUE){
  die($conn->error);
}

if(!$conn->query("INSERT INTO `zapytanie o przejazd` (Start, Koniec, Miejsca, Typ, `Cel podrozyID`) VALUES(DATE '2016-04-10', DATE '2016-04-20', '60', '1', '13')") === TRUE){
  die($conn->error);
}

#Rozsyłanie zapytań do współpracowników
require_once 'funkcje.php';
$funkcje = new Funkcje();
$funkcje->rozeslijZapytanieNocleg("1");
$funkcje->rozeslijZapytanieNocleg("2");
$funkcje->rozeslijZapytanieNocleg("3");


$funkcje->rozeslijZapytaniePrzejazd("1");
$funkcje->rozeslijZapytaniePrzejazd("2");
$funkcje->rozeslijZapytaniePrzejazd("3");

#NULL-0 brak odpowiedzi Data-1 zgoda Data-0 brak zgody NULL-1 nasza akceptacja
if(!$conn->query("UPDATE `wspolpracownik_ zapytanie o przejazd` SET `Data`= DATE '2017-01-30' ,`Zaakceptowane`='1',`Cena`='1000' WHERE ID = '1'") === TRUE){
 die($conn->error);
}

if(!$conn->query("UPDATE `wspolpracownik_ zapytanie o przejazd` SET `Data`= DATE '2017-01-30' ,`Zaakceptowane`='1',`Cena`='1500' WHERE ID = '2'") === TRUE){
 die($conn->error);
}

if(!$conn->query("UPDATE `wspolpracownik_ zapytanie o przejazd` SET `Data`= DATE '2017-01-30' WHERE ID = '3'") === TRUE){
 die($conn->error);
}

if(!$conn->query("UPDATE `wspolpracownik_ zapytanie o przejazd` SET `Data`= DATE '2017-01-30' ,`Zaakceptowane`='1',`Cena`='2000' WHERE ID = '4'") === TRUE){
 die($conn->error);
}

if(!$conn->query("UPDATE `wspolpracownik_ zapytanie o przejazd` SET `Data`= DATE '2017-01-30' ,`Zaakceptowane`='1',`Cena`='1000' WHERE ID = '1'") === TRUE){
 die($conn->error);
}

if(!$conn->query("UPDATE `wspolpracownik_ zapytanie o przejazd` SET `Data`= DATE '2017-01-30' ,`Zaakceptowane`='1',`Cena`='6400' WHERE ID = '6'") === TRUE){
 die($conn->error);
}

if(!$conn->query("UPDATE `wspolpracownik_ zapytanie o przejazd` SET `Data` = DATE '2017-01-30'  WHERE ID = '7'") === TRUE){
 die($conn->error);
}

if(!$conn->query("UPDATE `wspolpracownik_ zapytanie o przejazd` SET `Data`= DATE '2017-01-30' ,`Zaakceptowane`='1',`Cena`='1000' WHERE ID = '10'") === TRUE){
 die($conn->error);
}

if(!$conn->query("UPDATE `zapytanie o nocleg_wspolpracownik` SET `Data`= DATE '2017-01-30' ,`Zaakceptowane`='1',`Cena`='4500' WHERE ID = '1'") === TRUE){
 die($conn->error);
}

if(!$conn->query("UPDATE `zapytanie o nocleg_wspolpracownik` SET `Data` = DATE '2017-01-30' WHERE ID = '3'") === TRUE){
 die($conn->error);
}

if(!$conn->query("UPDATE `zapytanie o nocleg_wspolpracownik` SET `Data`= DATE '2017-01-30' ,`Zaakceptowane`='4',`Cena`='5000' WHERE ID = '4'") === TRUE){
 die($conn->error);
}

if(!$conn->query("UPDATE `zapytanie o nocleg_wspolpracownik` SET `Data` = DATE '2017-01-30' WHERE ID = '5'") === TRUE){
 die($conn->error);
}

if(!$conn->query("UPDATE `zapytanie o nocleg_wspolpracownik` SET `Data`= DATE '2017-01-30' ,`Zaakceptowane`='1',`Cena`='14500' WHERE ID = '7'") === TRUE){
 die($conn->error);
}

if(!$conn->query("UPDATE `zapytanie o nocleg_wspolpracownik` SET `Data` = DATE '2017-01-30' WHERE ID = '8'") === TRUE){
 die($conn->error);
}
?>
