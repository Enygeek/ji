
    <?php include"nav.php" ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    


    <style>

        /* Header */
        #header{
            background: rgba(0,0,0,0.9);
        }
        /************************************************************************/
		/******************** TEXT TYPING ***************/
		/* DEMO-SPECIFIC STYLES */
		.typewriter p{
			color: #28A745;
			font-family: monospace;
			overflow: hidden; /* Ensures the content is not revealed until the animation */
			/* border-right: .10em solid orange; The typwriter cursor */
			white-space: nowrap; /* Keeps the content on a single line */
			margin: 0 auto; /* Gives that scrolling effect as the typing happens */
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
<br><br><br>
    <!-- Section -->
    <div class="container">
        <section id="main">
            <div class="container mt-5 mb-5">
                <?php
                    
                    ob_start();
                    require '../config/database.php';


                    if (!empty($_FILES)) {

                        function verifyInput($data)
                        {
                            $data = trim($data);
                            $data = stripcslashes($data);
                            $data = htmlspecialchars($data);
                            return $data;
                        }
                        $nom_fichier = $_FILES['lienphoto']['name'];
                        $extension_fichier = strrchr($nom_fichier, ".");

                        $tmp_fichier = $_FILES['lienphoto']['tmp_name'];
                        $dest_ficher = '../img/profil/' . $nom_fichier;

                        $extension_autorise = array('.png', '.jpeg', '.jpg');

                        if (in_array($extension_fichier, $extension_autorise)) {
                            if (move_uploaded_file($tmp_fichier, $dest_ficher)) {
                                if ($extension_autorise = array('.png', '.PNG', '.jpeg','.JPEG', '.jpg', '.JPG')) {

                                    $photo = "../img/profil/" . $nom_fichier;
                                    $_SESSION['photo'] = $photo;
                                    if (isset($_POST['valider'])) {

                                        $nom = verifyInput($_POST['nom']);
                                        $prenom = verifyInput($_POST['prenom']);
                                        $sexe = verifyInput($_POST['sexe']);
                                        $niveau = verifyInput($_POST['niveau']);
                                        $tel = verifyInput($_POST['tel']);
                                        $email = verifyInput($_POST['email']);
                                        $password = verifyInput($_POST['password']);

                                        //$photo = verifyInput($_POST['lienphoto']);
                                        //$lienphoto = "../../images/".$lienphoto."";
                                        $date_register = date("Y-m-d");

                                        if ($niveau == "LICENCE 1") {
                                            $map = 15000;
                                        }
                                        if ($niveau == "LICENCE 2") {
                                            $map = 15000;
                                        }
                                        if ($niveau == "LICENCE 3") {
                                            $map = 20000;
                                        }
                                        if ($niveau == "MASTER 1") {
                                            $map = 15000;
                                        }
                                        if ($niveau == "MASTER 2") {
                                            $map = 15000;
                                        }

                                        $solde = 0;
                                        $rap = $map - $solde;
                                    }

                                    $db = Database::connect();


                                    // ************************************* CHECKBOX *************************************
                                    // Foreach pour les checkbox			   #Le_Z
                                    // Creation tableau
                                    $i = 0;
                                    $tabci = [];
                                    // Recuperation dans le tableau

                                    if (isset($_POST['option'])) { //sera vrai si au moins un moins un checkbox a été coché

                                        foreach ($_POST['option'] as $chkbx) {
                                            $tabci[$i] = $chkbx;


                                            echo "<br>";
                                            $i++;
                                        }
                                    }

                                    // Recupération des valeurs des checkbox dans les variables
                                    $ci1 = $tabci[0];
                                    $ci2 = $tabci[1];
                                    $ci3 = $tabci[2];
                                    $ci4 = $tabci[3];
                                    $ci5 = $tabci[4];

                                    // ********************************* INSERTION DANS LA BD **********************************  //

                                    // Insertion dans la table etudiant

                                    $insert = $db->prepare("INSERT INTO etudiant(nom, prenom, sexe, niveau, tel, email, password, lien_photo, date_register, montant_a_payer, solde, reste_a_payer)
                                                                VALUE(?,?,?,?,?,?,?,?,?,?,?,?)");
                                    $insert->execute(array($nom, $prenom, $sexe, $niveau, $tel, $email, $password, $photo, $date_register, $map, $solde, $rap));
                                    // </Fin_Insertion_dans_la table etudiant> //


                                    // Recuperation de id_etudiant

                                    $sql = $db->prepare("SELECT * FROM etudiant WHERE  tel = ?");
                                    $sql->execute(array($tel));
                                    $exist = $sql->fetch();

                                    $id_etu = $exist['tel'];
                                    // </Fin-recuperation_id_eudiant> //


                                    // Insertion dans la table centre_interet
                                    $insert = $db->prepare("INSERT INTO centre_interet(id_etudiant,ci1, ci2, ci3, ci4, ci5)
                                                                    VALUE(?,?,?,?,?,?)");
                                    $insert->execute(array($id_etu, $ci1, $ci2, $ci3, $ci4, $ci5));
                                    // </Fin_insertion dans la table centre_interet> //


                                    // *************************** </FIN INSERTION DANS LA BD> ********************************  //

                                    if ($insert) {

                                        Database::disconnect();

                                        echo "<div class='typewriter alert alert-success center' style='width: 90%; margin: auto;'><p>Inscription effectuée avec succès</p></div><br><br>
                                        <meta http-equiv='refresh' content='5; url = index.php' />
                                        ";
                                    }
                                } else {
                                    echo "Erreur Sur l'enregistrement de la Photo";
                                }
                            } else {
                                echo "jeune pb à resoudre";
                                // header("location:../inscri.php");
                            }
                        } else {
                            echo 'Format du fichier non supporter';
                        }
                    }


                    

                ?>

                <h1 class="text-center pt-5">Journée d'Intégration 2020</h1>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 my-auto mx-auto">
                        <div class="card">
                            <img src="images/LogoJI2k20_Officiel.jpg" alt="" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 mt-4">
                        <h2 class="text-center">Recensement des Etudiants <br> de la filière MIAGE-GI</h2>

                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="text" name="nom" class="form-control" required placeholder="Nom">
                            </div>
                            <div class="form-group">
                                <input type="text" name="prenom" class="form-control" required placeholder="Prénoms">
                            </div>
                            <div class="form-group">
                                <select name="sexe" id="" required class="form-control">
                                    <option value="homme">Homme</option>
                                    <option value="femme">Femme</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="niveau" id="" required class="form-control">
                                    <!-- <option disabled="disabled" selected="selected">Niveau</option> -->
                                    <option value="LICENCE 1">Licence 1</option>
                                    <option value="LICENCE 2">Licence 2</option>
                                    <option value="LICENCE 3">Licence 3</option>
                                    <option value="MASTER 1">Master 1</option>
                                    <option value="MASTER 2">Master 2</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="tel" id="tel" name="tel" class="form-control" required placeholder="Contact">
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" required placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" required placeholder="Password">
                            </div>
                            <div class="form-group">
                                <input type="file" name="lienphoto" class="form-control" required placeholder="photo">
                            </div>
                            <div class="form-check ml-2">
                                <label class="text-center" for="">Centre d'intêret</label><br>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                        <label class="form-check-label">
                                            <input class="form-check-input" name="option[]" value="Programmation WEB" type="checkbox"> Programmation WEB
                                        </label> <br>
                                        <label class="form-check-label">
                                            <input class="form-check-input" name="option[]" value="Programmation Mobile" type="checkbox"> Programmation Mobile
                                        </label> <br>
                                        <label class="form-check-label">
                                            <input class="form-check-input" name="option[]" value="Sport" type="checkbox"> Sport
                                        </label> <br>
                                        <label class="form-check-label">
                                            <input class="form-check-input" name="option[]" value="Mode" type="checkbox"> Mode
                                        </label> <br>
                                        <label class="form-check-label">
                                            <input class="form-check-input" name="option[]" value="Analyse" type="checkbox"> Analyse (Algèbre, Probabilité, statistique)
                                        </label> <br>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                        <label class="form-check-label">
                                            <input class="form-check-input" name="option[]" value="Cuisine" type="checkbox"> Cuisine
                                        </label> <br>
                                        <label class="form-check-label">
                                            <input class="form-check-input" name="option[]" value="Danse" type="checkbox"> Danse
                                        </label> <br>
                                        <label class="form-check-label">
                                            <input class="form-check-input" name="option[]" value="Chant" type="checkbox"> Chant
                                        </label> <br>
                                        <label class="form-check-label">
                                            <input class="form-check-input" name="option[]" value="Programmation 1" type="checkbox"> Programmation 1
                                        </label> <br>
                                        <label class="form-check-label">
                                            <input class="form-check-input" name="option[]" value="Programmation 2" type="checkbox"> Programmation 2
                                        </label> <br>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" name="valider" id="valider" class=" mt-3 btn bttn">Valider</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>


    <script>
        // var valid = document.gegtElementById('vailder');
        // var tel = document.getElementById('tel');
        // valid.addEventListerner('click',verif);


// Test script in JS
        var valid = document.getElementByClassName('form-check-input');
        // valid
        alert('Notre page contient ' + valid.length + 'checkbox');
        
        
        
        function verif(){
            // var som = 0;
            // if(som == 5){
            // }

        }
    </script>
    <!-- Script -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="../dist/sweetalert2.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>



    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
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
  <script src="../js/script.js"></script>

  <!-- Contact Form JavaScript File -->
  <script src="../contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="../js/main.js"></script>

</body>

</html>