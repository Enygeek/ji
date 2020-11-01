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
    <title>GesteScoMiage _By_Zabra</title>
    <meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link class="icon" rel="shortcut icon" href="../../images/send.png">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">

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
		nav{
			clear:both;
			background-color: rgb(15, 224, 162);
			border-bottom-left-radius: 10px;
    		border-bottom-right-radius: 10px;
		}
		header img{
			float: left;
			width: 80px;
			height: 100%;
		}

		.btn:hover{
			color: black;
		}
		#admin{
			float:right;
		}
		header #admin img{
			height:10%;
			width:10%;
		}
        .container1{
			text-align:center;
            width:100%;
			border-radius:10px;
			box-shadow: 0 5px 10px rgba(0,0,0,.5);
		}
		.container2{
			text-align:center;
            width:100%;
        }
        .row{
            margin-top: 3%;
        }
		/*********************************** INFO PERSO P1 *********************************/
		#photo{
			height: 235px;
			width:225px;
            border-radius: 5px;
		}
		#first{
			margin-left: 20%;
		} 
		#first tr td{
			border-bottom: 1px solid aqua;
			width: 230px;
			text-indent: 10%;
		}
		/********************************** INFO PERSO P2 *********************************/
		#tables{
            width: 100%;
			font-size: 25px;
			/* margin-top: 4%; */
		}
		.table{
			display: inline-block;
		}
		/* #table1{
			margin-left: 50px;
		} */
		table th{
			text-align: left;
		}
		table thead tr th{
			text-align: center;
		}
		body div div .label{
			border-bottom: 1px solid aqua;
			/* width: 230px; */
			/* text-indent: 10%; */
		}
		body div div .label:hover{
			border-bottom: 2px solid aqua;
			box-shadow: 0 10px 15px rgb(15, 224, 162);
		}
		/********************************** INFO PERSO P2 *********************************/
		#tables .table tr td{
			/* width: 230px;		A revoire */
		}
		/**************************************** FOOTER *************************************/
		h6{
			font-family: Moonbeam,verdana,arial; /*Calligraphic, AR CARTER,*/
			font-size:20px;
			letter-spacing: 5px;
		}
		footer{
			margin-top: 10%;
			padding-bottom:0.4%;
			color: white;
			background-color: rgb(1,15,26);
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
		/******************//*////////////////////////////////*/
		/*************** MODIF ******************/

		.label-input100 {
			font-family: Poppins-Regular;
			font-size: 16px;
			color: #020202; /*#808080;*/
			font-weight: bold;
			line-height: 1.2;
			text-align: left;
		}

		.contact100-form-btn {
			justify-content: center;
			align-items: center;
			padding: 0 20px;
			min-width: 140px;
			height: 40px;
			background-color: #57b846;
			border-radius: 10px;

			font-family: Poppins-Regular;
			font-size: 20px;
			color: #fff;
		}

		.contact101-form-btn {
			justify-content: center;
			align-items: center;
			padding: 0 20px;
			min-width: 140px;
			height: 40px;
			background-color: #dc3545;
			border-radius: 10px;

			font-family: Poppins-Regular;
			font-size: 20px;
			color: #fff;
		}

		.wrap-input100 {
			width: 100%;
			position: relative;
			border-bottom: 1px solid #b2b2b2;
			margin-bottom: 26px;
		}

		.input100 {
			font-family: Poppins-Regular;
			font-size: 18px;
			color: #555555;
			
			display: block;
			width: 100%;
			background: transparent;
			padding: 0 5px;
		}

		.input101 {
			font-family: Poppins-Regular;
			font-size: 18px;
			color: #555555;
			
			display: block;
			width: 100%;
			background: transparent;
			padding: 0 5px;
		}

		.focus-input100 {
			position: absolute;
			display: block;
			width: 100%;
			height: 100%;
			top: 0;
			left: 0;
			pointer-events: none;
		}

.focus-input100::before {
  content: "";
  display: block;
  position: absolute;
  bottom: -1px;
  left: 0;
  width: 0;
  height: 1px;

  -webkit-transition: all 0.6s;
  -o-transition: all 0.6s;
  -moz-transition: all 0.6s;
  transition: all 0.6s;

  background: #57b846;
}


/*---------------------------------------------*/
input.input100 {
  height: 36px;
}

/* 
textarea.input100 {
  min-height: 115px;
  padding-top: 14px;
  padding-bottom: 13px;
} */


.input100:focus + .focus-input100::before {
  width: 100%;
}

.has-val.input100 + .focus-input100::before {
  width: 100%;
}


	</style>
</head>

<body>

	<header>
		<a href="../adminacc.php"><img src="../../images/send.png" alt="..."></a>
		<div id="admin">
			<h6>Administrateur</h6>
		</div>
		<h1 style="text-indent: 40px; font-size: 45px;">GESTE<span style="color:aqua">SCO</span></h1>
		<nav><a href="traitement/deconnexion.php"><button class="btn btn-danger"style="font-size: 13px;margin-left: 8%;" type="button"> DECONNEXION </button></a></nav>
	</header>
	<br>

    
    <div class="container" style="margin-top: 3%;">

        <div class="container1">
            <h2 style="font-family: arial;">Page de modification des informations étudiant</h2>
        </div>
		<div class="tab-content" style="margin-top:1%;">
			<div class="row container">
				<div class="col-md-4">
				<hr>
					<div class="container2">
						<h4>Informations disponnibles</h4>
					</div>
				<hr><br>
					<?php
                        include 'traitement/afficher.php';
                        echo "<center>";
                        echo "<img id='photo' src=".$exist['lienphoto']." alt='...'><br>";
                        echo "</center>";
                       
						include 'traitement/afficher.php';
						echo "<center>";
						echo "<h2>Matricule ".$exist['matricule']."</h2>";
						echo "<center>";
					?>
					<table>
						<?php
								echo "<tr>";
									echo "<th>Nom</th>";
									echo "<td class='label'>".$exist['nom']."</td>";
								echo "</tr>";

								echo "<tr>";
									echo "<th>Prenom</th>";
									echo "<td class='label'>".$exist['prenom']."</td>";
								echo "</tr>";

								echo "<tr>";
									echo "<th>Date de naissance</th>";
									echo "<td class='label'>".$exist['datenaiss']."</td>";
								echo "</tr>";

								echo "<tr>";
									echo "<th>Lieu de naissance</th>";
									echo "<td class='label'>".$exist['lieunaiss']."</td>";
								echo "</tr>";

								echo "<tr>";
									echo "<th>Sexe</th>";
									echo "<td class='label'>".$exist['sexe']."</td>";
								echo "</tr>";
									
								echo "<tr>";
									echo "<th>Niveau</th>";
									echo "<td class='label'>".$exist['niveau']."</td>";
								echo "</tr>";

								echo "<tr>";
									echo "<th>Nationalite</th>";
									echo "<td class='label'>".$exist['nationalite']."</td>";
								echo "</tr>";

								echo "<tr>";
									echo "<th>E-mail</th>";
									echo "<td class='label'>".$exist['email']."</td>";
								echo "</tr>";

								echo "<tr>";
									echo "<th>Telephone</th>";
									echo "<td class='label'>".$exist['tel']."</td>";
								echo "</tr>";

								echo "<tr>";
									echo "<th>Correspondant</th>";
									echo "<td class='label'>".$exist['correspondant']."</td>";
								echo "</tr>";
						?>
					</table>
				</div>

				<div class="col-md-8">
				<hr>
					<div class="container2">
						<h4>Zone de modification</h4>
					</div>
				<hr>

				<form action="traitement/update.php" method="POST" enctype="multipart/form-data" class="contact100-form validate-form">
					<div class="tab-content container-fluid">
							<div class="row container-fluid" style="margin-left: 10%">

								<div class="box col-sm-6 col-md-4">

									<div class="wrap-input100 validate-input" required>
										<span class="label-input100">Nom :</span>
										<input class="input100" type="text" name="nom" placeholder="Monnom">
										<span class="focus-input100"></span>
									</div>

									<div class="wrap-input100 validate-input" required>
										<span class="label-input100">Prenom :</span>
										<input class="input100" type="text" name="prenom" placeholder="Mon prenom">
										<span class="focus-input100"></span>
									</div>

									<div class="wrap-input100 validate-input" required>
										<span class="label-input100">Date de naissance :</span>
										<input class="input100" type="date" name="datenaiss" placeholder="DATE DE NAISSANCE :">
										<span class="focus-input100"></span>
									</div>

									<div class="wrap-input100 validate-input" required>
										<span class="label-input100">Lieu de naissance :</span>
										<input class="input100" type="text" name="lieunaiss" placeholder="">
										<span class="focus-input100"></span>
									</div>

									<div class="wrap-input100 validate-input" required>
										<span class="label-input100" style="margin-top: -10px">SEXE :</span>
										<select class="input100" name="sexe">
											<option value="HOMME" selected>HOMME</option>
											<option value="FEMME">FEMME</option>
										</select>
										<span class="focus-input100"></span>
									</div>

								</div>

								<div class="box col-sm-6 col-md-4" style="margin-left:10%;">
									<div class="wrap-input100 validate-input" required>
										<span class="label-input100">Nationalité :</span>
										<input class="input100" type="text" name="nationalite" placeholder="">
										<span class="focus-input100"></span>
									</div>

									<div class="wrap-input100 validate-input" required>
										<span class="label-input100">Email :</span>
										<input class="input100" type="mail" name="email" placeholder="mymail@xyz.abc">
										<span class="focus-input100"></span>
									</div>

									<div class="wrap-input100 validate-input" required>
										<span class="label-input100">Telephone :</span>
										<input class="input100" type="number" name="tel" placeholder="TELEPHONE :">
										<span class="focus-input100"></span>
									</div>

									<div class="wrap-input100 validate-input" required>
									<span class="label-input100">Correspondant :</span>
										<input class="input100" type="text" name="correspondant" placeholder="Nom du parent">
										<span class="focus-input100"></span>
									</div>

									<div class="wrap-input100 validate-input" required>
										<span class="label-input100" style="margin-top: -10px">NIVEAU :</span>
										<select class="input100" name="niveau">
											<option value="LICENCE 1" selected>LICENCE 1</option>
											<option value="LICENCE 2">LICENCE 2</option>
											<option value="LICENCE 3">LICENCE 3</option>
											<option value="MASTER 1">MASTER 1</option>
											<option value="MASTER 2">MASTER 2</option>
										</select>
										<span class="focus-input100"></span>
									</div>
								</div>
								
									<div class="wrap-input100 validate-input" required>
										<span class="label-input100" style="margin-top: -10px; margin-left: 15px;">Photo :</span>
										<input type="file" name="lienphoto" class="input100">
										<span class="focus-input100"></span>
									</div>
								
							</div>
					</div>
					<center style="margin-top: 5%; margin-left: 40%;">
							<div class="row tab-content">
										<button type="submit" name="valider" value="Valider" class="btn contact100-form-btn" style="margin-top: 2px;">
											<span>Valider</span>
										</button>
										<div style="width:3px;"></div>
										<button type="reset" name="annuler" value="annuler" style="broder-radius:10px; margin-top: 2px;" class="btn btn-danger contact101-form-btn">
											<span>Annuler</span>
										</button>
							</div>
					</center>
			</form>
				</div>
				
				
				</div>
			</div>
			
		</div>
	
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
			<hr style="width: 50%; background-color: aqua;">
			<h6>Copiright &copy ZabraCode Inc. 2019</h6>
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