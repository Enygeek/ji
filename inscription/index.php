
    <?php include"nav.php";
        # Démarrage de la session
        session_start(); 
    ?>
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
        .typewriter {
            width: 90%;
        }
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

                    $errors = array(); // Un tableau pour reccueillir les éventuelles erreurs
                    $success = 0;      // Booleen attestant un envoi réussi du fichier
                    $file = "";
                    function verifyInput($data)
                    {
                        $data = trim($data);
                        $data = stripcslashes($data);
                        $data = htmlspecialchars($data);
                        return $data;
                    }

                    function encoding($choix) 
                    {
                        $code = "";
                            switch ($choix) 
                            {
                                case 'programmation':
                                    # code...
                                    $code = "1";
                                    break;

                                case 'musique':
                                    # code...
                                    $code = "2";
                                    break;

                                case 'design':
                                    # code...
                                    $code = "3";
                                    break;

                                case 'sport':
                                    # code...
                                    $code = "4";
                                    break;

                                case 'analyse':
                                    # code...
                                    $code = "5";
                                    break;

                                case 'innovations':
                                    # code...
                                    $code = "6";
                                    break;

                                case 'jeuxVideos':
                                    # code...
                                    $code = "7";
                                    break;
                                    
                                case 'lecture':
                                    # code...
                                    $code = "8";
                                    break;

                                case 'manga':
                                    # code...
                                    $code = "9";
                                    break;

                                default:
                                    # code...
                                    break;
                            }

                        return $code;
                    }

                    ob_start();
                    require '../config/database.php';


                    // Insertion du code du téléchargement du fichier photo

                    # Testons si le fichier a bien été envoyé et qu'il n'y a pas d'erreur
                    if (isset($_FILES['avatar-file']) AND $_FILES['avatar-file']['error'] == 0) 
                    {
                        # Testons si le fichier n'est pas trop gros (taille < 1Mo)
                        if ($_FILES['avatar-file']['size'] <= 3000000) 
                        {
                            # Récupération de l'extention du fichier
                            $infosFichier = pathinfo($_FILES['avatar-file']['name']);

                            $extensionFichier = $infosFichier['extension'];
                            
                            
                            $prefix = 'ji_'.md5(time()*rand(1, 9999));
                            $newFileName = $prefix.'.'.$extensionFichier;
                            $path = '../img/profil/'.$newFileName;

                            

                            # On compare le tableau avec un tableau d'extensions autorisés
                            $extensionAutorisees = array('jpg', 'jpeg', 'png');
                            if (in_array($extensionFichier, $extensionAutorisees)) 
                            {
                                # On valide l'upload du fichier
                                move_uploaded_file($_FILES['avatar-file']['tmp_name'],$path);
                                $success = 1;
                            }
                            else
                            {
                                $errors[] = "Format du fichier non supporter. Veulliez choisir un fichier au format .jpg, .png ou .jpeg.";
                            }
                        }
                        else
                        {
                            $errors[] = "Taille du fichier trop grande!";
                        }
                    }
                    else
                    {
                        $errors[] = "Erreurs rencontré lors de l'envoi du fichier. Veuillez réessaiyer...";
                    }

                    if (isset($_POST['valider'])) 
                    {
                        # On vérifie que les champs ne sont pas vides
                    
                        $db = Database::connect();

                        $query = $db->prepare('SELECT tel FROM etudiant WHERE tel = ?');
                        $query->execute([$_POST['tel']]);
                        $nbre = $query->fetch(PDO::FETCH_ASSOC);
                        if ($nbre) 
                        {
                            # Il y a donc un numero identique déjà présent dans la BD
                            $errors[] = "Ce numéro est déjà utilisé pour un autre compte";
                        }
                        else
                        {
                            $query = $db->prepare('SELECT email FROM etudiant WHERE email = ?');
                            $query->execute([$_POST['email']]);
                            $nbre = $query->fetch(PDO::FETCH_ASSOC);
                            if ($nbre) 
                            {
                                # Il y a donc un numero identique déjà présent dans la BD
                                $errors[] = "Cet adresse est déjà utilisée pour un autre compte";
                            }
                        }

                        // Reccupération du tableau des centres d'Intérêt
                        $i = 0;
                        $tabci = [];

                        if (isset($_POST)) 
                        { 
                            foreach ($_POST as $key => $post) 
                            {
                                if ($post == 'on') 
                                {
                                    $tabci[] = $key;
                                }
                            } 
                        }

                        // Vérification de la présence des 5 centres d'intérêts
                        if (count($tabci) == 5) 
                        {
                            $ci1 = encoding($tabci[0]);
                            $ci2 = encoding($tabci[1]);
                            $ci3 = encoding($tabci[2]);
                            $ci4 = encoding($tabci[3]);
                            $ci5 = encoding($tabci[4]);
                        }
                        else
                        {
                            $errors [] = "Veuillez sélectionner cinq (5) centres d'intérêts.";
                        }

                        // S'il n'y a pas d'erreurs, on procède alors à l'enregistrement dans la BD
                        if (empty($errors) AND $success == 1) 
                        {
                            $nom = verifyInput($_POST['nom']);
                            $prenom = verifyInput($_POST['prenom']);
                            $sexe = verifyInput($_POST['sexe']);
                            $niveau = verifyInput($_POST['niveau']);
                            $tel = verifyInput($_POST['tel']);
                            $email = verifyInput($_POST['email']);
                            $photo = "img/profil/" . $newFileName;
                            
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

                            // Insertion dans la table etudiant
 
                            //Préparation de la requête d'insertion

                            $query = $db->prepare("INSERT INTO etudiant(nom, prenom, sexe,niveau,tel, email, lien_photo, date_register, montant_a_payer, solde, reste_a_payer, ci1, ci2, ci3, ci4, ci5) 
                                VALUE(:nom,:prenom,:sexe,:niveau,:tel,:email,:lien_photo,:date_register,:montant_a_payer,:solde,:reste_a_payer, :ci1, :ci2, :ci3, :ci4, :ci5)");

                            // Assignation des valeurs aux différents champs

                            $query->bindValue(':nom', $nom);
                            $query->bindValue(':prenom', $prenom);
                            $query->bindValue(':sexe', $sexe);
                            $query->bindValue(':niveau', $niveau);
                            $query->bindValue(':tel', $tel);
                            $query->bindValue(':email', $email);
                            $query->bindValue(':lien_photo', $photo);
                            $query->bindValue(':date_register', $date_register);
                            $query->bindValue(':montant_a_payer', $map);
                            $query->bindValue(':solde', $solde);
                            $query->bindValue(':reste_a_payer', $rap);
                            $query->bindValue(':ci1', $ci1);
                            $query->bindValue(':ci2', $ci2);
                            $query->bindValue(':ci3', $ci3);
                            $query->bindValue(':ci4', $ci4);
                            $query->bindValue(':ci5', $ci5);

                            // Exécution de la requête

                            $query->execute();

                            if ($query) 
                            {
                                $_SESSION['nom'] = $nom;

                                echo"  <div class='row'>
                                <div class='col-12'>
                                    <div class='alert alert-success' role='alert'>
                                        <h4 class='alert-heading'><center>Bien Joué $nom!</center></h4>
                                        <p><center>Vous venez d'être enregistré(e) avec succès.</center></p>
                                    </div>
                                    <meta http-equiv='refresh' content='3; url = ../' />
                                </div>
                            </div> ";
                            }
                        }
                        else 
                        { ?>
                            <div class="row">
                                <div class="col-12">
                            <div class="alert alert-danger">
                                <p>
                                    <center>
                                        <strong>
                                            Vous n'avez pas rempli le formulaire correctement
                                        </strong>
                                    </center>
                                </p>
                                <ul>
                                    <?php foreach($errors as $error): ?>
                                        <li class="text-center"><?= $error;  ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>

                                </div>
                            </div>

                        <?php 
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
                            <div class="mx-auto pl-5">

                            <div data-bs-hover-animate="pulse" class="avatar-bg center mb-3" style="height:150px;width:150px;"></div>

                           

                            </div>
                            <div class="form-group">

                                <input type="file" class="form-control" name="avatar-file"  required style="background-color:rgba(247,249,252,0);">
                            </div>
                            <div class="col-md-4 relative">
                                <div class="avatar"></div>
                            </div>

                            <!-- <div class="form-group">
                                <input type="file" name="lienphoto" class="form-control" required placeholder="photo">
                            </div> -->



                            <div class="form-group">
                                <input type="text" name="nom" class="form-control" required placeholder="Nom">
                            </div>
                            <div class="form-group">
                                <input type="text" name="prenom" class="form-control" required placeholder="Prénoms">
                            </div>
                            <div class="form-group">
                                <select name="sexe" id="" class="form-control" required>
                                    <option disabled="disabled">Sexe</option>
                                    <option value="homme">Homme</option>
                                    <option value="femme">Femme</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="niveau" id="" class="form-control" required>
                                    <option disabled="disabled">Niveau</option>
                                    <option value="LICENCE 1">Licence 1</option>
                                    <option value="LICENCE 2">Licence 2</option>
                                    <option value="LICENCE 3">Licence 3</option>
                                    <option value="MASTER 1">Master 1</option>
                                    <option value="MASTER 2">Master 2</option>
                                </select>
                            </div>
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
                                <input type="email" name="email" class="form-control" required placeholder="Email">
                            </div>
                           
                            <div class="form-check ml-2">
                                <label class="text-center" for="">Centre d'intêret</label><br>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                        <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="programmation" onclick="count(this.form)"> Programmation
                                    </label><br>

                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="musique" onclick="count(this.form)">Musique
                                    </label><br>

                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="design" onclick="count(this.form)">Design, Infographie, Montage Vidéo
                                    </label><br>

                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="sport" onclick="count(this.form)"> Sport
                                    </label><br>

                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="analyse" onclick="count(this.form)"> Analyse (Algèbre, Probabilité, statistique)
                                    </label><br>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                        <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="innovations" onclick="count(this.form)">Innovations technologiques (Actualité, hightech...)
                                    </label><br>

                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="lecture" onclick="count(this.form)">Lecture
                                    </label><br>

                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="jeuxVideos" onclick="count(this.form)">Jeux vidéos
                                    </label><br>

                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="manga" onclick="count(this.form)"> Manga
                                    </label><br>
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
  <script src="../js/all.js"></script>

  <!-- AVATAR -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-animation.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script src="assets/js/Profile-Edit-Form.js"></script>

  <!-- Contact Form JavaScript File -->
  <script src="../contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="../js/main.js"></script>
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

</html>