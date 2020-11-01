<?php 

	session_start();
	ob_start();
	require '../../config/database.php';



	if (!empty($_FILES)) {
		$nom_fichier = $_FILES['lienphoto']['name'];
		$extension_fichier = strrchr($nom_fichier, ".");
	
		$tmp_fichier = $_FILES['lienphoto']['tmp_name'];
		$dest_ficher = '../../img/profil/' . $nom_fichier;
	
		$extension_autorise = array('.png', '.jpeg', '.jpg');
	
		if (in_array($extension_fichier, $extension_autorise)) {
			if (move_uploaded_file($tmp_fichier, $dest_ficher)) {
				if ($extension_autorise = array('.png', '.jpeg', '.jpg')) {

					$photo = "../../img/profil/".$nom_fichier;
					$_SESSION['photo'] = $photo;
					if(isset($_POST)){

						$nom = verifyInput($_POST['nom']);
						$prenom = verifyInput($_POST['prenom']);
						$sexe = verifyInput($_POST['sexe']);
						$niveau = verifyInput($_POST['niveau']);	
						$email = verifyInput($_POST['email']);
						$password = verifyInput($_POST['password']);

						// $ci1 = verifyInput($_POST['ci1']);
						// $ci2 = verifyInput($_POST['ci2']);
						// $ci3 = verifyInput($_POST['ci3']);
						// $ci4 = verifyInput($_POST['ci4']);
						// $ci5 = verifyInput($_POST['ci5']);
						//$photo = verifyInput($_POST['lienphoto']);
						//$lienphoto = "../../images/".$lienphoto."";
						$date_register = date("Y-m-d");

						if($niveau == "LICENCE 1"){
							$map = 15000;
						}
						if($niveau == "LICENCE 2"){
							$map = 15000;
						}
						if($niveau == "LICENCE 3"){
							$map = 20000;
						}
						if($niveau == "MASTER 1"){
							$map = 15000;
						}
						if($niveau == "MASTER 2"){
							$map = 15000;
						}

						$solde = 0;
						$rap = $map - $solde;
					}
										
					$db = Database::connect();

					// $sql = $db->prepare("SELECT * FROM etudiant WHERE matricule = ?");
					// $sql ->execute(array($matricule));
					// $exist = $sql->fetch();

					// if($matricule == $exist['matricule']){
					// 	header("location:../inscri.php");
					// 	echo "Ce matricule existe déjà dans la base de donnée";
					// }
					

						$insert = $db->prepare("INSERT INTO etudiant(nom, prenom, sexe, niveau, email, password, lien_photo, date_register, montant_a_payer, solde, reste_a_payer)
											VALUE(?,?,?,?,?,?,?,?,?,?,?)");
						$insert ->execute(array($nom,$prenom,$sexe,$niveau,$email,$password,$photo,$date_register,$map,$solde,$rap));


						// $insert = $db->prepare("INSERT INTO centre_interet(ci1, ci2, ci3, ci4, ci5)
						// 						VALUE(?,?,?,?,?)");
						// $insert ->execute(array($matricule,$dateinsc,$solde,$typeope,$visa));

						Database::disconnect();

						if($insert){
				

						header("location:success.php");


					}
				}else {
					echo "Erreur Sur l'enregistrement de la Photo";
				}
			}else{
				echo "jeune pb à resoudre";
				// header("location:../inscri.php");
			}
		}else {
			echo 'Format du fichier non supporter';
		}
	}


function verifyInput($data){
	$data = trim($data);
	$data = stripcslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

 ?>