<?php
require '../../config/database.php';
    session_start();
  if((empty($_SESSION['user']))){
    header("location:../../");
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
    <link rel="icon" href="">
    <link rel="stylesheet" href="../design/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../design/css/style.css">
    <link rel="stylesheet" href="../design/css/all.css">   

    <style>
        /************************************************************************/
		/******************** TEXT TYPING ***************/
		/* DEMO-SPECIFIC STYLES */
		.typewriter p{
			color: #28A745;
			font-family: monospace;
			overflow: hidden; /* Ensures the content is not revealed until the animation */
			/* border-right: .10em solid orange; The typwriter cursor */
			white-space: nowrap; /* Keeps the content on a single line */
			/* margin: 0 auto; Gives that scrolling effect as the typing happens */
			/* letter-spacing: .10em; Adjust as needed */
			animation: 
			typing 3.5s steps(30, end),
			blink-caret .5s step-end infinite;
		}

        /* ********************** Pour les erreurs ********************* */
        .typewritere p{
			color: red;
			font-family: monospace;
			overflow: hidden; /* Ensures the content is not revealed until the animation */
			/* border-right: .10em solid orange; The typwriter cursor */
			white-space: nowrap; /* Keeps the content on a single line */
			margin: 0 auto; /* Gives that scrolling effect as the typing happens*/
			/* letter-spacing: .10em; Adjust as needed */
			animation: 
			typing 3.5s steps(30, end),
			blink-caret .5s step-end infinite;
		}

		/* The typing effect */
		@keyframes typing {
			from { width: 0 }
			to { width: 100% }
			}

		/* The typewriter cursor effect */
		@keyframes blink-caret {
			from, to { border-color: transparent }
			50% { border-color: grey }
			}
    </style>
</head>
<body>

    <!-- Section -->
    <div class="container mt-5 pt-5">
        <section id="main">
                                <!--  -->
    <?php 

ob_start();

function verifyInput($data){
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$db = Database::connect();

// Récupération de info
$query = $db->prepare("SELECT nom FROM admin where id_admin = ?");
$query -> execute(array($_SESSION['user']));
$capte = $query -> fetch();

if(isset($_POST['valider'])){

    $tel = verifyInput($_POST['tel']);
    $dateope = date("Y-m-d");
    $montant = verifyInput($_POST['montant']);
    $visa = $capte['nom'];




    $sql = $db ->prepare("SELECT * FROM etudiant WHERE tel = ?");
    $sql ->execute(array($tel));
    $verify = $sql ->fetch();

    $id_etu = $verify["id_etudiant"];
    $nom_etu = $verify["nom"];
    $prenom_etu = $verify["prenom"];
    $map = $verify['reste_a_payer'];

    // Si les numéro de téléphone correspondent
    if($tel == $verify['tel']){
        $solde = $verify['solde'] + $montant;
        $rap = $verify['montant_a_payer'] - $solde;

        // ********** Cas d'erreur, message d'alerte, contrôl valeur & insert ********** //

        if ($verify['reste_a_payer'] == 0) {  //A-t-il sodé ? Yes!
            echo "<div class='typewriter alert alert-success center' style='width: 90%; margin: auto;'><p>$nom_etu $prenom_etu à déja soldé</p></div><br><br>
            "; 
        }
        else{ //La somme versé est supérieur au reste à payer
            if($solde > $verify['montant_a_payer']){
                echo "<div class='typewritere alert alert-danger center' style='width: 90%; margin: auto;'><p>Montant supérieur au reste à payer. Le reste à payer de $nom_etu $prenom_etu est de : $map Fcfa</p></div><br><br>";     
            }
            else{ // Sinon : insert
                $insert = $db -> prepare("INSERT INTO payement(id_etudiant, date_pay, montant, visa) 
                                        VALUES (?,?,?,?)");
                $insert ->execute(array($id_etu,$dateope,$montant,$visa));


                $insertn = $db -> prepare("UPDATE etudiant SET solde = ?, reste_a_payer = ? WHERE tel = ?"); 
                $insertn->execute(array($solde,$rap,$tel));

                if($insert == true && $insertn == true){ // Si insertion Ok
                    if($rap == 0){
                        echo "<div class='typewriter alert alert-success center' style='width: 90%; margin: auto;'><p>versement effectué avec succès. Félicitation $nom_etu $prenom_etu vous venez de solder ! votre nouveau solde est : $solde Fcfa et le reste à payer: $rap Fcfa</p></div><br><br> <meta http-equiv='refresh' content='3; url = ../' />";
                    }else{
                        echo "<div class='typewriter alert alert-success center' style='width: 90%; margin: auto;'><p>versement effectué avec succès. $nom_etu $prenom_etu Fcfa votre nouveau solde est : $solde Fcfa et le reste à payer: $rap Fcfa</p></div><br><br> <meta http-equiv='refresh' content='3; url = ../' />"; 
                    }
                }
                Database::disconnect();
            
            }
        }
    }else{
        echo "<div class='typewriter alert alert-success center' style='width: 90%; margin: auto;'><p>Ce numero de telephone ne corresponds à aucune personne inscrite</p></div><br><br>
        ";
    }

}
?>
            <div class="container mt-5 mb-5">
                <h1 class="text-center pt-5">Journée d'Intégration 2020</h1>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 my-auto mx-auto">
                        <div class="card">
                            <img src="../../img/LogoJI2k20_Officiel.jpg" alt="" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 mt-4">
                        <h2 class="text-center">EFFECTUEZ UN VERSEMENT <br><i style="letter-spacing: 3px; font-size:20px;">veuillez renseigner correctement <br>ces champs</i></h2>

                        <form action="" method="POST">
                            <div class="form-group">
                                <input  type="tel" 
                                        name="tel" 
                                        onkeyup ="spacing(this.form)" 
                                        class="form-control" 
                                        required 
                                        placeholder="Contact" 
                                        maxlength="11"/>
                                <small>Exemple : 01 02 03 04</small>
                            </div>
                            <div class="form-group">
                                <input type="number" name="montant" class="form-control" required placeholder="Montant">
                            </div>
                            
                            <input type="submit" name="valider" class="mt-3 btn bttn">
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div> 

    <!-- Script -->
    <script src="../../js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script> 
    <script src="js/script.js"></script>

    <a href="#" class="back-to-top pt-3"><i class="fa fa-chevron-up "></i></a>
  <!-- Uncomment below i you want to use a preloader -->
  <!-- <div id="preloader"></div> -->

  <!-- JavaScript Libraries -->
  <script src="../../lib/jquery/jquery.min.js"></script>
  <script src="../../lib/jquery/jquery-migrate.min.js"></script>
  <script src="../../lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../lib/easing/easing.min.js"></script>
  <script src="../../lib/superfish/hoverIntent.js"></script>
  <script src="../../lib/superfish/superfish.min.js"></script>
  <script src="../../lib/wow/wow.min.js"></script>
  <script src="../../lib/waypoints/waypoints.min.js"></script>
  <script src="../../lib/counterup/counterup.min.js"></script>
  <script src="../../lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="../../lib/isotope/isotope.pkgd.min.js"></script>
  <script src="../../lib/lightbox/js/lightbox.min.js"></script>
  <script src="../../lib/touchSwipe/jquery.touchSwipe.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="../../contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="../../js/main.js"></script>
  <script src="../../js/all.js"></script>

  <script type="text/javascript">
    function spacing(form)
    {
        if (form.tel.value.length == 2 || form.tel.value.length == 5 || form.tel.value.length == 8) 
        {
            form.tel.value = form.tel.value+' ';
        }
        
    }
  </script>

</body>

    <!-- <script>
        $(function(){
            $("#mobile-nav-active").click(function(){
                $("#deco").hide();
            });
        });
    </script> -->
</html>

<?php } ?>