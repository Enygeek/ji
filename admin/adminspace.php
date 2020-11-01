<?php
	require '../config/database.php';
		session_start();
	if((empty($_SESSION['user']))){
		header("location:../");
	}else{
 ?>
<?php include"navacc.php" ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>JI MIAGE</title>
    <!-- Meta -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Link -->
    <link rel="icon" href="">
    <link rel="stylesheet" href="design/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="design/css/style.css">
    <link rel="stylesheet" href="design/css/all.css">

    <style>
        #logoji{
            width: 15%;
            height: 20%;
        }
        .font {
            font-size:20px;
        }
        .bt {
            border : 3px solid #fafafa;
            color: white;
            background:#ce9929;
        }

        .bt:hover {
            background: #fff;
            color : #ce9929;
            box-shadow : inset 5px 10px #fff;
        }


        @media screen and (max-width:500px) {
            #logoji {
                width : 40%;
                height : 30%;
            }
            .bye {
                display:none;
            }
        }
    </style>
</head>
<body>
    
    <!-- Section -->
    <div class="container pt-5 mt-3">
        <section id="main">
            <div class="tab-content container mt-5 mb-5">
                <div class="row container-fluid mx-auto pt-3">
                        <img id="logoji" src="../img/LogoJI2k20_Officiel.jpg" alt="" class="img-fluid">
                        <h1 class="text-center mx-auto py-5">Journée d'Intégration 2020</h1>
                        <img id="logoji" class="bye" src="../img/LogoJI2k20_Officiel.jpg" alt="" class="img-fluid">
                </div> <br>

                <center><p class="font">Bienvenue, vous êtes habilité à effectuer les opérations suivantes :</p></center>

                <div class="row container mx-auto pt-3" style="">
                    
						<div class="box col-xs-12 col-sm-12 col-md-6">
                            <center><h1>VERSEMENT</h1></center><hr>
                            <div class="card">
    						    <img class="img-fluid" src="design/images/dollar-1362244__480.jpg" alt="...">
                            </div>
							<div class="thumbnail">
								<center>
                                    <a href="versement/"><button class="btn my-3 bt">Effectuer</button></a>
                                </center>
							</div>
						</div>
                  
						<div class="box col-xs-12 col-sm-12 col-md-6">
                            <center><h1>CONSULTER</h1></center><hr>
                            <div class="card">
    							<img class="img-fluid" src="design/images/office-1209640__480.webp" alt="...">
                            </div>
							<div class="thumbnail">
                                <center>
                                <a href="consulter/consulter.php"><button class="btn my-3 bt">Consulter</button></a>
                                </center>
                            </div>
                            
						</div>
                    

                </div>
                <p class="text-center py-2"> JI MIAGE 2020 | By Commission Logiciel</p>

            </div>
        </section>
    </div> 
    

    <!-- Script -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script> 
    <script src="js/script.js"></script>


    <a href="#" class="back-to-top pt-3"><i class="fa fa-chevron-up"></i></a>
  <!-- Uncomment below i you want to use a preloader -->
  <!-- <div id="preloader"></div> -->

  <!-- JavaScript Libraries -->
  <script src="../lib/jquery/jquery.min.js"></script>
  <script src="../lib/jquery/jquery-migrate.min.js"></script>
  <script src="../lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../lib/easing/easing.min.js"></script>
  <script src="../lib/superfish/hoverIntent.js"></script>
  <script src="../lib/superfish/superfish.min.js"></script>
  <script src="../lib/wow/wow.min.js"></script>
  <script src="../lib/waypoints/waypoints.min.js"></script>
  <script src="../lib/counterup/counterup.min.js"></script>
  <script src="../lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="../lib/isotope/isotope.pkgd.min.js"></script>
  <script src="../lib/lightbox/js/lightbox.min.js"></script>
  <script src="../lib/touchSwipe/jquery.touchSwipe.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="../contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="../js/main.js"></script>
  <script src="../js/all.js"></script>

  <!-- <nav id="mobile-nav">
        
      </nav> -->
</body>
</html>
<!-- A VOIR -->
<!-- En format téléphone faire disparaître le bouton rouge deconnexion -->


<?php } ?>


















<!-- Par Enoch ZABRA // WebLeaning //WebCoding //Perfectionnement-->
<!-- Projet personnel WEB MIAGE #2019 -->
<!-- Date: Juin 2019 --- GesteSco Inc. by Zabra --- Tout droits reservés-->