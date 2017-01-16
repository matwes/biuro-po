<?php

class Funkcje
{
	public function pobierzWspolpracownikow()
	{
		$udaloSie = true;
		
		$checkconnection = mysqli_connect('localhost', 'root', 'pass');
		if(!$checkconnection) {
			$udaloSie = false;
		}
		
		$db_selected = mysqli_select_db($checkconnection, 'biuro');
		if (!$db_selected) {
			$udaloSie = false;
		}
		
                
                $conn = new mysqli('localhost', 'root', 'pass', 'biuro'); 
		$sql = "SELECT Nazwa FROM wspolpracownik";
		$result = $conn->query($sql);
		
		$i = 0;
		while($row = $result->fetch_assoc())
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
