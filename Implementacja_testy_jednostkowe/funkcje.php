<?php

class Funkcje
{
	public function zaladujBaze()
	{		
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
		$wsp = '';
		
		$i = 0;
		while($row = $result->fetch_assoc())
		{
			$id = $row['ID'];
			$wsp = $wsp . "<tr><td><a class='nazwyF' href='profil.php?id={$id}'>".$row['Nazwa']."</a></td></tr>";
			$i = $i + 1;
		}
		
		while($i < 7)
		{
			$wsp = $wsp . "<tr><td></td></tr>";
			$i = $i + 1;
		}
		
		return $wsp;
	}
	
	public function pobierzUslugi($id)
	{
		$conn = $this->zaladujBaze();
		$sql = "SELECT Standard, `Cel podrozyID` FROM `usluga nocleg` WHERE WspolpracownikID = {$id}";
		$result = $conn->query($sql);
		$uslugi = '';
		
		$i = 0;
		while($row = $result->fetch_assoc())
		{
			switch ($row['Standard']) {
				case 1:
					$star = 'gwiazdka';
					break;
				case 2:
					$star= 'gwiazdki';
					break;
				case 3:
					$star = 'gwiazdki';
					break;
				case 4:
					$star = 'gwiazdki';
					break;
				case 5:
					$star = 'gwiazdek';
					break;
			}
			$uslugi = $uslugi. "<tr><td style='width:80%;'><span class='nazwyF'>".$this->pobierzCelPodrozy($row['Cel podrozyID'])." - <i>".$row['Standard']." {$star}</i></span></td>
								<td style='width:20%;'><span class='nazwyF'>Noclegowa</span></td></tr>";
			$i = $i + 1;
		}
		
		
		$sql = "SELECT Typ, Miejsca FROM `usluga przejazd` WHERE WspolpracownikID = {$id}";
		$result = $conn->query($sql);
		$uslugaP = mysqli_num_rows($result);
		while($row = $result->fetch_assoc())
		{
			switch ($row['Typ']) {
				case 1:
					$lok = 'Samolot';
					break;
				case 2:
					$lok = 'Autobus';
					break;
				case 3:
					$lok = 'Statek';
					break;
			}
			$uslugi = $uslugi. "<tr><td style='width:80%;'><span class='nazwyF'><b>".$lok."</b> - <i>".$row['Miejsca']." miejsc</i></span></td>
								<td style='width:20%;'><span class='nazwyF'>Przejazdowa</span></td></tr>";
			$i = $i + 1;
		}
		
		while($i < 3)
		{
			$uslugi = $uslugi. "<tr><td></td></tr>";
			$i = $i + 1;
		}
		
		return $uslugi;
	}
	
	public function pobierzCelPodrozy($id)
	{
		$conn = $this->zaladujBaze();
		$sql = "SELECT Miasto, KrajID FROM `cel podrozy` WHERE ID={$id}";
		$result = $conn->query($sql);
		
		
		$row = $result->fetch_assoc();
		$cel=$this->pobierzKraj($row['KrajID']);
		$cel = "<b>".$cel ."</b> - ". $row['Miasto'];
		
		
		return $cel;
	}
	
	public function pobierzKraj($id)
	{
		$conn = $this->zaladujBaze();
		$sql = "SELECT Nazwa FROM `kraj` WHERE ID = {$id}";
		$result = $conn->query($sql);
		
		$row = $result->fetch_assoc();
		$kraj=$row['Nazwa'];
		
		return $kraj;
	}
	
	public function pobierzMiasto($id)
	{
		$conn = $this->zaladujBaze();
		$sql = "SELECT Miasto FROM `cel podrozy` WHERE ID = {$id}";
		$result = $conn->query($sql);
		
		$row = $result->fetch_assoc();
		$miasto=$row['Miasto'];
		
		return $miasto;
	}
	
	public function pobierzKraje()
	{
		$conn = $this->zaladujBaze();
		$sql = "SELECT Nazwa, ID FROM `kraj`";
		$result = $conn->query($sql);
		$kraje = "";
		
		$i  = 1;
		while($row = $result->fetch_assoc())
		{
			if($i == 1){
				$kraje = $kraje. "<option selected='selected' value={$row['ID']}>{$row['Nazwa']}</option>";
				$i=0;
			}
			else
				$kraje = $kraje. "<option value={$row['ID']}>{$row['Nazwa']}</option>";
		}
		
		return $kraje;
	}
	
	public function pobierzDane($id, $atr){
		$conn = $this->zaladujBaze();
		$sql = "SELECT {$atr} FROM wspolpracownik WHERE ID = {$id};";
		$result = $conn->query($sql);
		$num_rows_returned = mysqli_num_rows($result);
		$data = '';
		 
		
		 if ($num_rows_returned > 0)
		{
			while($row = $result->fetch_assoc())
			{
				$data = $row[$atr];
			}
		} else {
			$data = 'Nie znaleziono wspolpracownika o takim id.';
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
		$sql = "SELECT * FROM `zapytanie o nocleg` ORDER BY ID DESC";
		$result = $conn->query($sql);
		
		while($row = $result->fetch_assoc())
		{
			$id = $row['ID'];
			echo "<div class = 'form-horizontal well'><p style='font-size:15px;'>Zapytanie o nocleg w {$this->pobierzCelPodrozy($row['Cel podrozyID'])}, w okresie: <b>{$row['Start']}</b> - <b>{$row['Koniec']}</b>, potrzebnych miejsc:
			<b>{$row['Miejsca']}</b>, wymagany standard: <b>{$row['Standard']}</b></p>
				<div style='display: inline-block;'>{$this->pobierzOdpowiedzi($id, 1)}</div>								
									</div>";
		}
		
		$sql = "SELECT * FROM `zapytanie o przejazd` ORDER BY ID DESC";
		$result = $conn->query($sql);
		
		while($row = $result->fetch_assoc())
		{
			switch ($row['Typ']) {
				case 1:
					$lok = 'Samolot';
					break;
				case 2:
					$lok = 'Autobus';
					break;
				case 3:
					$lok = 'Statek';
					break;
			}
			
			$id = $row['ID'];
			echo "<div class = 'form-horizontal well'><p style='font-size:15px;'>Zapytanie o przejazd do {$this->pobierzCelPodrozy($row['Cel podrozyID'])}, w okresie: <b>{$row['Start']}</b> - <b>{$row['Koniec']}</b>, potrzebnych miejsc:
		<b>{$row['Miejsca']}</b>, środek transportu: <b>{$lok}</b></p>
				<div style='display: inline-block;'>{$this->pobierzOdpowiedzi($id, 2)}</div>							
									</div>";
		}
		
		return $result;
	}
	
	 public function pobierzOdpowiedzi($id, $typ)
	{
		$conn = $this->zaladujBaze();
		if($typ==1)
			$sql = "SELECT * FROM `zapytanie o nocleg_wspolpracownik` WHERE `Zapytanie o noclegID`={$id}";
		else
			$sql = "SELECT * FROM `wspolpracownik_ zapytanie o przejazd` WHERE `Zapytanie o przejazdID`={$id}";
		
		$result = $conn->query($sql);
		$dane = "";
		
		while($row = $result->fetch_assoc())
		{
			
			$idW = $row['WspolpracownikID'];
			$dane = $dane . "<div style='float:left; border-radius: 25px; background-color: rgb(238, 238, 238); border: 2px solid rgb(51, 122, 183); margin: 15px 30px; padding:  10px; width: 220px; height: 100px;'>{$this->pobierzDane($idW, 'Nazwa')}";
			if($row['Data']==NULL)
			{
				if($row['Zaakceptowane']==0)
					$dane = $dane."<p></p><p style='font-size:13px;'>Oczekiwanie na odpowiedź</p></div>";
				else
					$dane = $dane."<p></p><p style='font-size:13px;'>Oferta wybrana</p></div>";
			}
			else if($row['Zaakceptowane']==0)
				$dane = $dane."<p></p><p style='color:red; font-size:15px;'>Propozycja odrzucona</p></div>";
			else
				$dane = $dane."<p style='margin-bottom: 3px;'>{$row['Cena']} złotych</p><button onclick='akceptuj({$typ}, {$row['ID']})' type='button' class='btn btn-primary' style='margin: 15px 50px;'>Zaakceptuj</button></div>";
		}
		
		return $dane;
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
                  $sql3 = "INSERT INTO `zapytanie o nocleg_wspolpracownik` (`Zapytanie o noclegID`, WspolpracownikID) VALUES('{$id}', '{$row['ID']}')";
    	          if(!$conn->query($sql3) === TRUE){
		    die($conn->error);
    	          } 
                } 
              }
        }
     }	

     public function rozeslijZapytaniePrzejazd($id){
      
        $conn = $this->zaladujBaze();
	$sql = "SELECT * FROM `zapytanie o przejazd` WHERE ID = {$id}";
	$result = $conn->query($sql);
	if(mysqli_num_rows($result) > 0){
            $row = $result->fetch_assoc();
            $sql2 = "SELECT wspolpracownik.ID 
            FROM wspolpracownik
            INNER JOIN `usluga przejazd`
            ON wspolpracownik.ID = `usluga przejazd`.`WspolpracownikID`
            WHERE `usluga przejazd`.`Miejsca` >= {$row['Miejsca']} AND `usluga przejazd`.Typ = {$row['Typ']}";
            $final_result = $conn->query($sql2);
  	      if(mysqli_num_rows($final_result) > 0){
                while($row = $final_result->fetch_assoc()){
                  $sql3 = "INSERT INTO `wspolpracownik_ zapytanie o przejazd` (`Zapytanie o przejazdID`, WspolpracownikID) VALUES('{$id}', '{$row['ID']}')";
    	          if(!$conn->query($sql3) === TRUE){
		    die($conn->error);
    	          } 
                } 
              }
        }
     }	

    public function generujListeKrajow(){
      $conn = $this->zaladujBaze();
      $sql = "SELECT * FROM Kraj";
      $result = $conn->query($sql);
      $string = "";
      while($row = $result->fetch_assoc()){
        $string =  $string . "<option value='" . $row['ID'] . "' <?=($funkcje->zczytajWartosc($_POST, $_SESSION, \"kraj\")) == {$row['ID']} ? ' selected=\"selected\"' : '';?>" . $row['Nazwa'] . '</option>';
		//$string =  $string . "<option value='" . $row['ID'] . "'>" . $row['Nazwa'] . '</option>';
      }
      return $string;
    }
	
    public function pobierzZapytaniaWspolpracownikow()
	{
		$conn = $this->zaladujBaze();
		$sql = "SELECT * FROM `zapytanie o nocleg_wspolpracownik`";

		$result = $conn->query($sql);
		$string = "";
		while($row = $result->fetch_assoc())
		{
		 $wspolpracownik = $conn->query("SELECT Nazwa FROM wspolpracownik WHERE ID = '{$row['WspolpracownikID']}'");
		 $nazwa = $wspolpracownik->fetch_assoc()['Nazwa'];

		 $zapytanie = $conn->query("SELECT Start, Koniec, `Cel podrozyID` FROM `zapytanie o nocleg` WHERE ID = '{$row['Zapytanie o noclegID']}'");
		 $zapytanie_row = $zapytanie->fetch_assoc();
		 $daty = $zapytanie_row['Start'];
		 $celID = $zapytanie_row['Cel podrozyID'];

		 $cel = $conn->query("SELECT Miasto, KrajID FROM `cel podrozy` WHERE ID = '{$celID}'");
		 $miasto = $cel->fetch_assoc()['Miasto'];


		 $string = $string . "<tr><td style = 'padding: 10px;'>Nocleg</td><td style='padding: 10px;'>" . $row['ID'] . " " . $nazwa . " " . $row['Zapytanie o noclegID'] . "</td> <td style='padding: 10px;'>" . $daty . "</td><td>" . $miasto . "</td>";
		 
		 if($row['Data'] === null and $row['Zaakceptowane'] == 1){
                   $string = $string . "<td style='padding: 10px;'> &nbsp </td><td style='padding: 10px;'> Odrzucone </td></tr> \r\n";
		 }
		 else{
		   if($row['Zaakceptowane'] == 0){
        	     $string = $string . "<td style='padding: 10px;'> <input type='submit' name='{$row['ID']}' value='Akceptuj Nocleg'/> </td>";
	             $string = $string . "<td style='padding: 10px;'> <input type='submit' name='{$row['ID']}' value='Odrzuć Nocleg'/> </td></tr> \r\n";
	       
		   }
		   else{
                     $string = $string . "<td style='padding: 10px;'>Zaakceptowane</td><td style='padding: 10px;'> &nbsp </td></tr> \r\n";
		   }
		 }
	}
		
		$sql = "SELECT * FROM `wspolpracownik_ zapytanie o przejazd`";

		$result = $conn->query($sql);
		while($row = $result->fetch_assoc())
		{
		 $wspolpracownik = $conn->query("SELECT Nazwa FROM wspolpracownik WHERE ID = '{$row['WspolpracownikID']}'");
		 $nazwa = $wspolpracownik->fetch_assoc()['Nazwa'];

		 $zapytanie = $conn->query("SELECT Start, Koniec, `Cel podrozyID` FROM `zapytanie o przejazd` WHERE ID = '{$row['Zapytanie o przejazdID']}'");
		 $zapytanie_row = $zapytanie->fetch_assoc();
		 $daty = $zapytanie_row['Start'];
		 $celID = $zapytanie_row['Cel podrozyID'];

		 $cel = $conn->query("SELECT Miasto, KrajID FROM `cel podrozy` WHERE ID = '{$celID}'");
		 $miasto = $cel->fetch_assoc()['Miasto'];


		 $string = $string . "<tr><td style='padding: 10px;'>Przejazd</td><td style='padding: 10px;'>" . $row['ID'] . " " . $nazwa . " " . $row['Zapytanie o przejazdID'] . "</td> <td style='padding: 10px;'>" . $daty . "</td><td>" . $miasto . "</td>";
		 if($row['Data'] === null and $row['Zaakceptowane'] == 1){
                   $string = $string . "<td style='padding: 10px;'>  </td><td style='padding: 10px;'> Odrzucone </td></tr> \r\n";
		 }
		 else{
		   if($row['Zaakceptowane'] == 0){
        	     $string = $string . "<td style='padding: 10px;'> <input type='submit' name='{$row['ID']}' value='Akceptuj Przejazd'/> </td>";
	             $string = $string . "<td style='padding: 10px;'> <input type='submit' name='{$row['ID']}' value='Odrzuć Przejazd'/> </td></tr> \r\n";
	       
		   }
		   else{
                     $string = $string . "<td style='padding: 10px;'>Zaakceptowane</td><td style='padding: 10px;'>  </td></tr> \r\n";
		   }
		 }
	}

		
		return $string;
	}

    public function obslozZapytanie($id, $typ){
      $conn = $this->zaladujBaze();

      switch($typ){
        case 'Akceptuj Przejazd':
	  $cena = rand(1000, 10000);
          if(!$conn->query("UPDATE `wspolpracownik_ zapytanie o przejazd` SET `Zaakceptowane`='1', `Data` = DATE '2017-01-30', Cena = '{$cena}' WHERE ID = '{$id}'") === TRUE){
            die($conn->error);
          }
	  break;
	case 'Odrzuć Przejazd':
	 if(!$conn->query("UPDATE `wspolpracownik_ zapytanie o przejazd` SET `Data` = DATE '2017-01-30' WHERE ID = '{$id}'") === TRUE){
            die($conn->error);
          }
	  break;
	case 'Akceptuj Nocleg':
         $cena = rand(1000, 10000);
          if(!$conn->query("UPDATE `zapytanie o nocleg_wspolpracownik` SET `Zaakceptowane`='1', `Data` = DATE '2017-01-30', Cena = '{$cena}' WHERE ID = '{$id}'") === TRUE){
            die($conn->error);
          }
	  break;
	case 'Odrzuć Nocleg':
          if(!$conn->query("UPDATE `zapytanie o nocleg_wspolpracownik` SET `Data` = DATE '2017-01-30' WHERE ID = '{$id}'") === TRUE){
            die($conn->error);
          }
	  break;
	default:
	  echo 'Coś nie poszło nie tak :(';
      }
    }

}

?>	
