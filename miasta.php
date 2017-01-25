<?php
    $server = 'localhost';
    $login = 'root';
    $pword = 'pass';
    $dbname = 'biuro';
    mysql_connect($server,$login,$pword) or die($connect_error); 
    mysql_select_db($dbname) or die($connect_error);

    $kraj = $_POST['theOption'];

    $query = "SELECT * FROM `cel podrozy` WHERE `KrajID` = {$kraj}";
    $result = mysql_query($query);
    $num_rows_returned = mysql_num_rows($result);

    $r = '<label for="ctySelect">Miasto:</label> <select class="form-control" id="ctySelect">';

    if ($num_rows_returned > 0)
	{
        while ($row = mysql_fetch_assoc($result))
		{
            $r = $r . '<option value="' .$row['ID']. '">' . $row['Miasto'] . '</option>';
        }
    } else {
        $r = '<p>Nie znaleziono żadnego miasta dla tego kraju.</p>';
    }


    $r = $r . '</select>';

    echo $r;
	?>