<?php

class Funkcje
{
		public function zaladujBaze()
	{
		$udaloSie = true;
		
		$checkconnection = mysqli_connect('localhost', 'root', 'pass');
		if(!$checkconnection) {
			die('Nie udało się połączyć do bazy danych');
		}
		
		$db_selected = mysqli_select_db($checkconnection, 'biuro');
		if (!$db_selected) {
			die('Nie udało się połączyć do bazy danych');
		}
		           
        $conn = new mysqli('localhost', 'root', 'pass', 'biuro'); 
		return $conn;
	}
	
	public function pobierzWspolpracownikow()
	{
		$conn = $this->zaladujBaze();
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
		
		return $i;
	}

	public function sprawdzEmailCzyWBazie($post){
	        $message = "";
          	$conn = $this->zaladujBaze();
		$email = trim($post["email"]);
		$sql = "SELECT * FROM wspolpracownik WHERE Email = '" . trim($email) . "';";
		$result = $conn->query($sql);
		if(mysqli_num_rows($result) > 0){
                  $message = "Podany email jest już w bazie danych, proszę podać inny.";
		}
                
		return $message;

		
	}

	public function sprawdzTelefonCzyWBazie($post){
	        $message = "";
          	$conn = $this->zaladujBaze();
		$phone = trim($post["tel"]);
		$sql = "SELECT * FROM wspolpracownik WHERE Telefon = '" . trim($phone) . "';";
		$result = $conn->query($sql);
		if(mysqli_num_rows($result) > 0){
                  $message = "Podany numer telefonu jest już w bazie danych, proszę podać inny.";
		}
                
		return $message;

		
	}

	public function sprawdzCzyWBazie($post){
		$message1 = $this->sprawdzEmailCzyWBazie($post);
		$message2 = $this->sprawdzTelefonCzyWBazie($post);
		$message = $message1 . '\r\n' .  $message2;
		return $message;
	}

}

?>`	
