<?php
	$servername = "localhost";
	$username = "root";
	$password = "pass";

	$conn = new mysqli($servername, $username, $password, "biuro");
	if($conn->connect_error){
	  die("Polącznie nie wyszlo");
	}

	if(!$conn->query("USE biuro") === TRUE){
	  die($conn->error);
	}

	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}

    $kraj = $_POST['theOption'];

    $query = "SELECT * FROM `cel podrozy` WHERE `KrajID` = {$kraj}";
    $result = $conn->query($query);
    $num_rows_returned = mysqli_num_rows($result);

    $r = '<label for="ctySelect" class="col-sm-2 control-label">Miasto</label><div class="col-sm-10" id="miasta"><select class="form-control" id="ctySelect" name="ctySelect"  required>';

    if ($num_rows_returned > 0)
	{
        while ($row = $result->fetch_assoc())
		{
            $r = $r . '<option value="' .$row['ID']. '">' . $row['Miasto'] . '</option>';
        }
    } else {
        $r = '<p>Nie znaleziono żadnego miasta dla tego kraju.</p>';
    }


    $r = $r . '</select><br></div>';

    echo $r;
	?>