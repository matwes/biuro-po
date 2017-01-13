<?php

class Funkcje
{
	public function pobierzWspolpracownikow()
	{
		$udaloSie = true;
		
		$checkconnection = mysql_connect('localhost', 'root', 'pass');
		if(!$checkconnection) {
			$udaloSie = false;
		}
		
		$db_selected = mysql_select_db('biuro');
		if (!$db_selected) {
			$udaloSie = false;
		}
		
		$sql = "SELECT Nazwa FROM wspolpracownik";
		$result = mysql_query($sql);
		
		$i = 0;
		while($row = mysql_fetch_array($result))
		{
			echo "<tr><td>".$row['Nazwa']."</td></tr>";
			$i = $i + 1;
		}
		
		while($i < 10)
		{
			echo "<tr><td></td></tr>";
			$i = $i + 1;
		}
		
		return $udaloSie;
	}
}

?>`	