<?php

require_once 'kierownikInterfejs.php';

class KierownikInterfejsTest extends PHPUnit_Framework_TestCase
{
	
	public function testWyswietlFormularz()
	{
		$wspolpracownik = new KierownikInterfejs();
		$oczekiwanie = true;
		$this->assertEquals($oczekiwanie, $wspolpracownik->wyswietlFormularz());
	}
	
	public function testDodajDane()
	{
		$wspolpracownik = new KierownikInterfejs();
		$oczekiwanie = true;
		$this->assertEquals($oczekiwanie, $wspolpracownik->dodajDane());
	}
	
	public function testWyswietlBlad()
	{
		$wspolpracownik = new KierownikInterfejs();
		$blad = 'Jakis blad';
		$oczekiwanie = true;
		$this->assertEquals($oczekiwanie, $wspolpracownik->wyswietlBlad($blad));
	}
	
	public function testWyswietlDane()
	{
		$wspolpracownik = new KierownikInterfejs();
		$oczekiwanie = true;
		$this->assertEquals($oczekiwanie, $wspolpracownik->wyswietlDane());
	}
	
	public function testZatwierdzDane()
	{
		$wspolpracownik = new KierownikInterfejs();
		$oczekiwanie = true;
		$this->assertEquals($oczekiwanie, $wspolpracownik->zatwierdzDane());
	}
	
	public function testWyswietlProfil()
	{
		$wspolpracownik = new KierownikInterfejs();
		$oczekiwanie = true;
		$this->assertEquals($oczekiwanie, $wspolpracownik->wyswietlProfil());
	}
	
	
	public function testWybierzTypUslugi()
	{
		$wspolpracownik = new KierownikInterfejs();
		$oczekiwanie = true;
		$this->assertEquals($oczekiwanie, $wspolpracownik->wybierzTypUslugi());
	}
	
	public function testWyswietlFormularzUslug()
	{
		$wspolpracownik = new KierownikInterfejs();
		$oczekiwanie = true;
		$this->assertEquals($oczekiwanie, $wspolpracownik->wyswietlFormularzUslug());
	}
	
	public function testWpiszDane()
	{
		$wspolpracownik = new KierownikInterfejs();
		$oczekiwanie = true;
		$this->assertEquals($oczekiwanie, $wspolpracownik->wpiszDane());
	}
	
	public function testWyswietlDaneUslugi()
	{
		$wspolpracownik = new KierownikInterfejs();
		$oczekiwanie = true;
		$this->assertEquals($oczekiwanie, $wspolpracownik->wyswietlDaneUslugi());
	}
	
	public function testPoprawDaneUslugi()
	{
		$wspolpracownik = new KierownikInterfejs();
		$oczekiwanie = true;
		$this->assertEquals($oczekiwanie, $wspolpracownik->poprawDaneUslugi());
	}
	
	public function testZatwierdzDaneUslugi()
	{
		$wspolpracownik = new KierownikInterfejs();
		$oczekiwanie = true;
		$this->assertEquals($oczekiwanie, $wspolpracownik->zatwierdzDaneUslugi());
	}
}
?>