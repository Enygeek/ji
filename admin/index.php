<?php
require '../config/database.php';
    session_start();
  if((isset($_SESSION['user']))){
    header("location:adminspace.php");
  }else{
?> 

<?php include"nav.php" ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>JI MIAGE</title>
    <!-- Meta -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Link -->
    <link rel="icon" href="../img/logo.png">
    <link rel="stylesheet" href="design/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="design/css/style.css">
    <link rel="stylesheet" href="design/css/all.css">   
</head>
<body>
    
    <!-- Section -->
    <div class="container mt-5 pt-5">
        <section id="main">
            <div class="container mt-5 mb-5">
                <h1 class="text-center pt-5">Journée d'Intégration 2020</h1>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 my-auto mx-auto">
                        <div class="card">
                            <img src="../img/LogoJI2k20_Officiel.jpg" alt="" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 mt-4">
                        <h3 class="text-center mb-2">ADMINISRATEUR <br>Entrez vos identifiants</h3>

                        <form action="traitement/login.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="text" name="username" class="form-control" required placeholder="Username">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" required placeholder="Password">
                            </div>
                            
                            <input type="submit" name="valider" class="mt-3 btn bttn">
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div> 


    <a href="#" class="back-to-top pt-3"><i class="fa fa-chevron-up"></i></a>

    <!-- Script -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script> 
    <script src="js/script.js"></script>



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

</body>
</html>

<?php } ?>