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

				$photo = "../../img/profil/" . $nom_fichier;
				$_SESSION['photo'] = $photo;
				if (isset($_POST)) {

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

						echo $tabci[$i];
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

					header("location:success.php");
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


function verifyInput($data)
{
	$data = trim($data);
	$data = stripcslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
