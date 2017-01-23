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
}

if(!$conn->query("CREATE DATABASE biuro") === TRUE){
  die($conn->error);
}

if(!$conn->query("USE biuro") === TRUE){
  die($conn->error);

}
if(!$conn->query("CREATE TABLE Wspolpracownik(
ID int(10) NOT NULL AUTO_INCREMENT, 
Nazwa varchar(255) NOT NULL, 
Imie varchar(255) NOT NULL, 
Nazwisko varchar(255) NOT NULL, 
Telefon varchar(16) NOT NULL UNIQUE, 
Email varchar(255) NOT NULL UNIQUE, 
Login varchar(20) NOT NULL UNIQUE, 
Haslo varchar(40) NOT NULL, 
PRIMARY KEY (ID));") === TRUE){
  die($conn->error);
}

if(!$conn->query("CREATE TABLE `Cel podrozy` (ID int(10) NOT NULL AUTO_INCREMENT, Miasto varchar(255) NOT NULL UNIQUE, KrajID int(10) NOT NULL, PRIMARY KEY (ID));") === TRUE){
  die($conn->error);
}

if(!$conn->query("CREATE TABLE `Usluga przejazd` (ID int(10) NOT NULL AUTO_INCREMENT, Typ int(10) NOT NULL, Miejsca int(10) NOT NULL, WspolpracownikID int(10) NOT NULL, PRIMARY KEY (ID));") === TRUE){
  die($conn->error);
}

if(!$conn->query("CREATE TABLE `Usluga nocleg` (ID int(10) NOT NULL AUTO_INCREMENT, Standard int(10) NOT NULL, `Cel podrozyID` int(10) NOT NULL, WspolpracownikID int(10) NOT NULL, PRIMARY KEY (ID));") === TRUE){
  die($conn->error);
}

if(!$conn->query("CREATE TABLE `Wyjazd_Usluga przejazd` (WyjazdID int(10) NOT NULL, `Usluga przejazdID` int(10) NOT NULL, DataR date NOT NULL, DataZ date NOT NULL, WspolpracownikID2 int(10) NOT NULL, PRIMARY KEY (WyjazdID, `Usluga przejazdID`));") === TRUE){
  die($conn->error);
}

if(!$conn->query("CREATE TABLE `Usluga nocleg_Wyjazd` (`Usluga noclegID` int(10) NOT NULL, WyjazdID int(10) NOT NULL, DataR date NOT NULL, DataZ date NOT NULL, WspolpracownikID2 int(10) NOT NULL, PRIMARY KEY (`Usluga noclegID`, WyjazdID));") === TRUE){
  die($conn->error);
}

if(!$conn->query("CREATE TABLE `Wspolpracownik_ Zapytanie o przejazd` (WspolpracownikID int(10) NOT NULL, `Zapytanie o przejazdID` int(10) NOT NULL, Data date NOT NULL, PRIMARY KEY (WspolpracownikID, `Zapytanie o przejazdID`));") === TRUE){
  die($conn->error);
}

if(!$conn->query("CREATE TABLE `Zapytanie o nocleg_Wspolpracownik` (ID int(10) NOT NULL AUTO_INCREMENT, `Zapytanie o noclegID` int(10) NOT NULL, WspolpracownikID int(10) NOT NULL, Data date NOT NULL, PRIMARY KEY (ID));") === TRUE){
  die($conn->error);
}

if(!$conn->query("CREATE TABLE Kraj (ID int(10) NOT NULL AUTO_INCREMENT, Nazwa varchar(255) NOT NULL UNIQUE, PRIMARY KEY (ID), UNIQUE INDEX (ID));") === TRUE){
  die($conn->error);
}

if(!$conn->query("CREATE TABLE `Zapytanie o nocleg` (ID int(10) NOT NULL AUTO_INCREMENT, Start date NOT NULL, Koniec date NOT NULL, Miejsca int(10) NOT NULL, Standard int(10) NOT NULL, `Cel podrozyID` int(10) NOT NULL, PRIMARY KEY (ID));") === TRUE){
  die($conn->error);
}

if(!$conn->query("CREATE TABLE `Zapytanie o przejazd` (ID int(10) NOT NULL AUTO_INCREMENT, Start date NOT NULL, Koniec date NOT NULL, Miejsca int(10) NOT NULL, Typ int(10) NOT NULL, `Cel podrozyID` int(10) NOT NULL, PRIMARY KEY (ID));") === TRUE){
  die($conn->error);
}

if(!$conn->query("ALTER TABLE `Wyjazd_Usluga przejazd` ADD INDEX FKWyjazd_Usl323806 (`Usluga przejazdID`), ADD CONSTRAINT FKWyjazd_Usl323806 FOREIGN KEY (`Usluga przejazdID`) REFERENCES `Usluga przejazd` (ID);") === TRUE){
  die($conn->error);
}

if(!$conn->query("ALTER TABLE `Usluga nocleg_Wyjazd` ADD INDEX `FKUsluga noc475283` (`Usluga noclegID`), ADD CONSTRAINT `FKUsluga noc475283` FOREIGN KEY (`Usluga noclegID`) REFERENCES `Usluga nocleg` (ID);") === TRUE){
  die($conn->error);
}


if(!$conn->query("ALTER TABLE `Usluga nocleg_Wyjazd` ADD INDEX `FKUsluga noc560082` (WspolpracownikID2), ADD CONSTRAINT `FKUsluga noc560082` FOREIGN KEY (WspolpracownikID2) REFERENCES Wspolpracownik (ID);") === TRUE){
  die($conn->error);
}

if(!$conn->query("ALTER TABLE `Wyjazd_Usluga przejazd` ADD INDEX FKWyjazd_Usl845745 (WspolpracownikID2), ADD CONSTRAINT FKWyjazd_Usl845745 FOREIGN KEY (WspolpracownikID2) REFERENCES Wspolpracownik (ID);") === TRUE){
  die($conn->error);
}

if(!$conn->query("ALTER TABLE `Cel podrozy` ADD INDEX `FKCel podroz956837` (KrajID), ADD CONSTRAINT `FKCel podroz956837` FOREIGN KEY (KrajID) REFERENCES Kraj (ID);") === TRUE){
  die($conn->error);
}

if(!$conn->query("ALTER TABLE `Wspolpracownik_ Zapytanie o przejazd` ADD INDEX FKWspolpraco579477 (WspolpracownikID), ADD CONSTRAINT FKWspolpraco579477 FOREIGN KEY (WspolpracownikID) REFERENCES `Wspolpracownik` (ID);") === TRUE){
  die($conn->error);
}

if(!$conn->query("ALTER TABLE `Wspolpracownik_ Zapytanie o przejazd` ADD INDEX FKWspolpraco206820 (`Zapytanie o przejazdID`), ADD CONSTRAINT FKWspolpraco206820 FOREIGN KEY (`Zapytanie o przejazdID`) REFERENCES `Zapytanie o przejazd` (ID);") === TRUE){
  die($conn->error);
}

if(!$conn->query("ALTER TABLE `Zapytanie o nocleg_Wspolpracownik` ADD INDEX `FKZapytanie 563828` (WspolpracownikID), ADD CONSTRAINT `FKZapytanie 563828` FOREIGN KEY (WspolpracownikID) REFERENCES Wspolpracownik (ID);") === TRUE){
  die($conn->error);
}

if(!$conn->query("ALTER TABLE `Zapytanie o nocleg_Wspolpracownik` ADD INDEX `FKZapytanie 503239` (`Zapytanie o noclegID`), ADD CONSTRAINT `FKZapytanie 503239` FOREIGN KEY (`Zapytanie o noclegID`) REFERENCES `Zapytanie o nocleg` (ID);") === TRUE){
  die($conn->error);
}

if(!$conn->query("ALTER TABLE `Zapytanie o nocleg` ADD INDEX `FKZapytanie 975585` (`Cel podrozyID`), ADD CONSTRAINT `FKZapytanie 975585` FOREIGN KEY (`Cel podrozyID`) REFERENCES `Cel podrozy` (ID);") === TRUE){
  die($conn->error);
}

if(!$conn->query("ALTER TABLE `Zapytanie o przejazd` ADD INDEX `FK Zapytanie526776` (`Cel podrozyID`), ADD CONSTRAINT `FK Zapytanie526776` FOREIGN KEY (`Cel podrozyID`) REFERENCES `Cel podrozy` (ID);") === TRUE){
  die($conn->error);
}

if(!$conn->query("ALTER TABLE `Usluga nocleg` ADD INDEX `FKUsluga noc656217` (`Cel podrozyID`), ADD CONSTRAINT `FKUsluga noc656217` FOREIGN KEY (`Cel podrozyID`) REFERENCES `Cel podrozy` (ID);") === TRUE){
  die($conn->error);
}

if(!$conn->query("ALTER TABLE `Usluga nocleg` ADD INDEX `FKWspolpracownik01` (`WspolpracownikID`), ADD CONSTRAINT `FKWspolpracownik01` FOREIGN KEY (`WspolpracownikID`) REFERENCES `Wspolpracownik` (ID);") === TRUE){
  die($conn->error);
}

if(!$conn->query("ALTER TABLE `Usluga przejazd` ADD INDEX `FKWspolpracownik02` (`WspolpracownikID`), ADD CONSTRAINT `FKWspolpracownik02` FOREIGN KEY (`WspolpracownikID`) REFERENCES `Wspolpracownik` (ID);") === TRUE){
  die($conn->error);
}

if(!$conn->query("ALTER TABLE `Cel podrozy` ADD INDEX `FKKraj` (`KrajID`), ADD CONSTRAINT `FKKraj` FOREIGN KEY (`KrajID`) REFERENCES `Kraj` (ID);") === TRUE){
  die($conn->error);
}

$conn->close();
?>
