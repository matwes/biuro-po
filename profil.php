<?php

require_once 'funkcje.php';

$funkcje = new Funkcje();

   if(isset($_GET["id"])){
	 $id = $_GET["id"];
   }

	$nazwa = $funkcje->pobierzDane($id, 'Nazwa');
	$imie = $funkcje->pobierzDane($id, 'Imie');
	$nazwisko = $funkcje->pobierzDane($id, 'Nazwisko');
	$telefon = $funkcje->pobierzDane($id, 'Telefon');
	$email = $funkcje->pobierzDane($id, 'Email');
	
?>
<!DOCTYPE html>
<html lang ="pl">
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<meta charset="utf-8">
		<title>Profil współpracownika</title>
		<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="src/miniPopup.js"></script>
	</head>
	<body>
		<div class="container">
			<div class="jumbotron">
				<div class="row" style="width: 80%;">
				<h1 style="margin-top:0px;"><?php echo $nazwa ?></h1>
					<div class="span6">
						<div class="nonboxy-widget">
							<div class="widget-head">
								<h3>Dane osoby kontaktowej</h3>
							</div>
							<div class="widget-content">
								<div class="widget-box">
									<div class = 'form-horizontal well'>
										<fieldset>
											<div class="control-group">
												<div>
													<label for="imie" class="col-sm-2 control-label">Imię</label>
														<div class="col-sm-10">
															<p class="nowyWsp"><?php echo $imie ?></p>
														</div>
												</div>
												<div>
													<label for="nazw" class="col-sm-2 control-label">Nazwisko</label>
														<div class="col-sm-10">
															<p class="nowyWsp"><?php echo $nazwisko ?></p>
														</div>
												</div>
												<div>
													<label for="tel" class="col-sm-2 control-label">Telefon</label>
														<div class="col-sm-10">
															<p class="nowyWsp"><?php echo $telefon ?></p>
														</div>
												</div>
												<div>
													<label for="email" class="col-sm-2 control-label">Email</label>
													<div class="col-sm-10">
														<p class="nowyWsp"><?php echo $email ?></p>
													</div>
												</div>
											</div>
										</fieldset>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			
				<div class="form-horizontal" style="margin-left: -15px; margin-rigt:-15px">
					
					
					<h3>Usługi współpracownika</h3>
					
					<table class="table table-striped">
						<thead >
							<tr>
								<th style="width:80%;">Nazwa usługi</th>
								<th style="width:20%;">Typ usługi</th>
							</tr>
						</thead>
						<tbody style="height:120px;">
							<tr>
								<td style="width:80%;">Hotel Marigold</td>
								<td style="width:20%;">Hotelowa</td>
							</tr>
							<tr>
								<td style="width:80%;">Hotel Marigold</td>
								<td style="width:20%;">Hotelowa</td>
							</tr>
							<tr>
								<td style="width:80%;">Hotel Marigold</td>
								<td style="width:20%;">Hotelowa</td>
							</tr>
						</tbody>
				</table>
					
					<div style="width:100%; margin: 0 auto;">
						<div style='float: left;'>
							<button onClick="location.href = 'index.php';" type="button" class="btn btn-primary btn-lg pull-right">Powrót do listy współpracowników</button>
						</div>
						<div style='float: right;'>
							<ul class="nav navbar-nav" >
								<li class="root">
									<button type="button" class="btn btn-primary btn-lg pull-right">Dodaj usługę</button>
									<ul class="dropdown-menu" style="min-width: 140px;">
										<li><input type="Button" class="ShowDemo btn btn-default" style="width:97%; margin: 2px;" value="Nocleg" /></li>
										<li><input type="Button" class="ShowDemo btn btn-default" style="width:97%; margin: 2px;" value="Przejazd" /></li>
									</ul>
								</li>
							</ul>
						</div>
					</div>
				</div><br/><br/>
			</div>
			<br/><br/>

  
    <div class="mini-popup">
        <div class="mini-popup-header">
            <div class="mini-popup-buttons mini-popup-close  close" title="Close"></div>
        </div>
        <div class="mini-popup-content">
            <h4 align="center">Dodawanie usługi transportowej</h4>
			<div class="form-group">
				<label for="sel1">Typ środka lokomocji:</label>
				<select class="form-control" id="sel1">
					<option>Samolot</option>
					<option>Autobus</option>
					<option>Statek</option>
				</select>
				<br/>
				<label for="miejsca">Dostępna liczba miejsc:</label>
				<input type="number" class="form-control" id="miejsca">
		  </div>
        </div>
        <div class="mini-popup-footer">
            <div class="confirm">
                <div class="mini-popup-buttons confirm-btn">
                    <input type="button" class="confirmbtn" value="Zatwierdź" />
                    <span class="mini-popup-buttons confirm-left"></span>
                </div>
            </div>
            <div class="cancel">
                <div class="mini-popup-buttons cancel-btn">
                    <input type="button" class="cancelbtn" value="Anuluj" />
                    <span class="mini-popup-buttons cancel-left"></span>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
    $(function() {

        var popup = $('.mini-popup').miniPopup({
            beforeOpen: function() {
                console.log('The miniPopup beforeOpen.');
            },
            beforeClose: function() {
                console.log('The miniPopup beforeClose');
            }
        });
        
        $('.ShowDemo').click(function() {
            popup.miniPopup('open');
        });

    });
    </script>
</div><script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

		
	</body>
	
</html>