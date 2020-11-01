<?php
	require '../../config/database.php';
		session_start();
	if((empty($_SESSION['user']))){
		header("location:../../index.php");
	}else{
 ?>
<!DOCTYPE html>
<html>
<head>
    <title>VersSco_Zabra</title>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->
	<link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link class="icon" rel="shortcut icon" href="../../images/send.png">


	<style>
	</style>
</head>

<body>

	<header>
		<a href="../adminacc.php"><img src="../../images/send.png" alt="..."></a>
		<div id="admin">
			<h6>Administrateur</h6>
		</div>
		<h1 style="text-indent: 40px; font-size: 48px; font-family:forte; margin-top:1%;">VERSCO<span style="color:aqua">SCO</span></h1>
		<nav><a href="traitement/deconnexion.php"><button class="btn btn-danger" style="font-size: 13px;margin-left: 8%;" type="button"> DECONNEXION </button></a></nav>
	</header>
	<br>

	<center>
		<form method="POST" action="traitement/insert.php">
				<h2 style="text-align: center;">EFFECTUER UN VERSEMENT</h2><br>
				<table style="margin-left: 50px;">
				<tr>
					<th for="matricule">Matricule</th>
					<td><input type="text" name="matricule" required></td>
				</tr>

				<tr>
					<th for="montant">Montant</th>
					<td><input type="int" name="montant" required></td>
				</tr>
				

				<tr>
					<th for="typeope">Type de <br>l'opération</th>	
						<td>
							<select name="typeope" style="width:173px;">
							<option value="ESPECE" selected>ESPECE</option>
							<option value="CHEQUE">CHEQUE</option>
							</select>
						</td>
				</tr>
					<tr>       
						<th><label for="visa">Visa</label></th>
						<td><input type="text" name="visa" required></td>
					</tr>   
					<center> 
				</table>	
					
					<center style="margin-bottom: 10px; margin-top: 10px;">
						<input type="submit" value="Valider" class="bt btn btn-success">
						<input type="reset" value="Annuler" class="bt btn btn-info">
					</center>
		</form>
	</center>


	<footer>
		<center>
			<div class='now'>
				<?php
					$datenow = date("Y-m-d");
					//$timenow = date("H: m : s");
					echo "<h5>DATE : ".$datenow."</h5>";
					//echo "<h5 class='now'>HEURE : ".$timenow."</h5>";
				?>
			</div>
			<div class='now'>
				<h5 class="Heure">Heure :</h5> 
				<p class="Heure" id='clock'></p>
			</div>
			<div>
				<hr style="width: 50%; background-color: aqua;">
				<h6>Copiright ZabraCode Inc. 2019</h6>
			</div>
			
		</center>
	</footer>

    <script>
		// raccourci d’écriture
		function $(id){return document.getElementById(id)}
		
		function hms(){
			var today=new Date();
			var hrs=today.getHours(),mns=today.getMinutes(),scd=today.getSeconds();
			var str=(hrs<10?"0"+hrs:hrs)+":"+(mns<10?"0"+mns:mns)+":"+(scd<10?"0"+scd:scd);
			$("clock").innerHTML=str;
			setTimeout(hms,1000);// réécriture toutes les 1000 millisecondes
		}
		hms();// lancement de la fonction
	</script>
</body>
</html>



<?php } ?>











<!-- Par Enoch ZABRA // WebLeaning //WebCoding //Perfectionnement-->
<!-- Projet personnel WEB MIAGE #2019 -->
<!-- Date: Juin 2019 --- GesteSco Inc. by Zabra --- Tout droits reservés-->