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
		$sql = "SELECT Nazwa, ID FROM wspolpracownik";
		$result = $conn->query($sql);
		
		$i = 0;
		while($row = $result->fetch_assoc())
		{
			$id = $row['ID'];
			echo "<tr><td><a class='nazwyF' href='profil.php?id={$id}'>".$row['Nazwa']."</a></td></tr>";
			$i = $i + 1;
		}
		
		while($i < 7)
		{
			echo "<tr><td></td></tr>";
			$i = $i + 1;
		}
		
		return $i;
	}
	
	public function pobierzDane($id, $atr){
		 $conn = $this->zaladujBaze();
		 $sql = "SELECT {$atr} FROM wspolpracownik WHERE ID = {$id};";
		 $result = $conn->query($sql);
		 
		 $data = '';
		 while($row = $result->fetch_assoc())
		{
			$data = $row[$atr];
		}
		 
		 return $data;
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
		if($message1 == "" and $message2 == ""){
		  $message = "";
		}else{
		  $message = $message1 . '\r\n' .  $message2;
		}  
		return $message;
	}

	public function zczytajWartosc($post, $session, $zmienna){
           $wartosc = "";
	   if(isset($session[$zmienna])){
             $wartosc = $session[$zmienna];
	   }
           if(isset($post[$zmienna])){
             $wartosc = $post[$zmienna];
	   }
	   return $wartosc;
	}
 
      public function generujStringa($length) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
      } 
    
      public function pobierzZapytania()
	{
		$conn = $this->zaladujBaze();
		$sql = "SELECT Nazwa, ID FROM wspolpracownik";
		$result = $conn->query($sql);
		
		$i = 0;
		while($row = $result->fetch_assoc())
		{
			$id = $row['ID'];
			echo "<tr><td><a class='nazwyF' href='profil.php?id={$id}'>".$row['Nazwa']."</a></td></tr>";
			$i = $i + 1;
		}
		
		while($i < 7)
		{
			echo "<tr><td></td></tr>";
			$i = $i + 1;
		}
		
		return $i;
	}


     public function rozeslijZapytanieNocleg($id){
      
        $conn = $this->zaladujBaze();
	$sql = "SELECT * FROM `zapytanie o nocleg` WHERE ID = {$id}";
	$result = $conn->query($sql);
	if(mysqli_num_rows($result) > 0){
            $row = $result->fetch_assoc();
            $sql2 = "SELECT wspolpracownik.ID 
            FROM wspolpracownik
            INNER JOIN `usluga nocleg`
            ON wspolpracownik.ID = `usluga nocleg`.`WspolpracownikID`
            WHERE `usluga nocleg`.`Standard` = {$row['Standard']} AND `usluga nocleg`.`Cel podrozyID` = {$row['Cel podrozyID']}";
            $final_result = $conn->query($sql2);
  	      if(mysqli_num_rows($final_result) > 0){
                while($row = $final_result->fetch_assoc()){
		  echo $id;
                  $sql3 = "INSERT INTO `zapytanie o nocleg_wspolpracownik` (`Zapytanie o noclegID`, WspolpracownikID, Data) VALUES('{$id}', '{$row['ID']}', NOW())";
    	          if(!$conn->query($sql3) === TRUE){
		    die($conn->error);
    	          } 
                } 
              }
        }
     }	

}

?>	
