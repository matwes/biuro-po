<?php

require_once 'funkcje.php';

class FunkcjeTest extends PHPUnit_Framework_TestCase
{
	
	public function testPobierzWspolpracownikow()
	{
		$funkcje = new Funkcje();
		$oczekiwanie = true;
		$this->assertEquals($oczekiwanie, $funkcje->pobierzWspolpracownikow());
	}
}
?>