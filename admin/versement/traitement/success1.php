<?php 
require '../../../config/database.php';
	session_start();
	if(!(isset($_SESSION['user']))){
		header("location:../../../index.php");
	}else{
 
 ?>
<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<title>Page de Succès</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
    <link class="icon" rel="shortcut icon" href="../../../images/send.png">
    
	<style>
		body{
			margin:0px;
			padding: 0px;
		}
		header{
			padding-top: 0.5%;
			background-color: rgb(1,15,26);
			color:white;
		}

		#newinscri{
			margin-top:5%;
			background-color: rgb(15, 224, 162);
			width:40%;
			padding:20px;
			border: 1px solid aqua;
			box-shadow: 0 10px 20px rgba(0,0,0,.8);
    		border-radius: 10px;
			font-size:100%;
		}

		nav{
			background-color: rgb(15, 224, 162);
			border-bottom-left-radius: 10px;
    		border-bottom-right-radius: 10px;
		}
		header img{
			float: left;
			width: 80px;
			height: 100%;
		}

		#admin{
			float:right;
		}
		header #admin img{
			height:10%;
			width:10%;
		}
		
		a{
			text-decoration:none;
			color:black;
		}
		h6{
			font-family: Moonbeam,verdana,arial;
			font-size:20px;
			letter-spacing: 5px;
		}
		footer{
			margin-top: 10%;
			padding-bottom:0.4%;
			color: white;
			background-color: rgb(1,15,26);
		}
		.btn{
			background-color: #dc3545;
			color: white;
			border: 2px solid #dc3545;
		}
		.now{
			font-size: 25px;
			display: inline-block;
			letter-spacing: 1px;
			margin-left: 5%;
		}
		footer hr{
			background-color: aqua;
			height:1.5px;
			border: none;
		}
		.now{
			display : inline-block;
			margin-left: 2%;
			letter-spacing: 1px;
		}
		.Heure{
			display: inline-block;
		}
	</style>

</head>

<body>

	<header>
		<a href="../../adminacc.php"><img src="../../../images/send.png" alt="..."></a>
		<div id="admin">
			<h6>Administrateur</h6>
		</div>
		
		<h1 style="text-indent: 40px;">GESTE<span style="color:aqua">SCO</span></h1>
		<nav><a href="deconnexion.php"><button class="btn" type="button"> DECONNEXION </button></a></nav>
	</header>
	<br><br>

<center>
<h1> Versement éffectué</h1>

	<a href="../versement.php">
		<button id="newinscri"style="margin-top: 20px; text-decoration: none; ">Effectuer un nouveau versement</button>
	</a>

</center>
</body>

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