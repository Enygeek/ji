<!-- <script>
	alert("valider");
</script> -->

<?php 

	session_start();
	ob_start();
	require '../../../config/database.php';



	if (!empty($_FILES)) {
		$nom_fichier = $_FILES['lienphoto']['name'];
		$extension_fichier = strrchr($nom_fichier, ".");
	
		$tmp_fichier = $_FILES['lienphoto']['tmp_name'];
		$dest_ficher = '../../../images/' . $nom_fichier;
	
		$extension_autorise = array('.png', '.jpeg', '.jpg');
	
		if (in_array($extension_fichier, $extension_autorise)) {
			if (move_uploaded_file($tmp_fichier, $dest_ficher)) {
				if ($_FILES['fichier']['error'] == 0) {

					$photo = "../../images/".$nom_fichier;
					$_SESSION['photo'] = $photo;
					if(isset($_POST)){

						$matricule = $_SESSION['mat'];
						$nom = verifyInput($_POST['nom']);	
						$prenom = verifyInput($_POST['prenom']);
						$datenaiss = verifyInput($_POST['datenaiss']);
						$lieunaiss = verifyInput($_POST['lieunaiss']);
						$sexe = verifyInput($_POST['sexe']);
						$niveau = verifyInput($_POST['niveau']);
						$nationalite = verifyInput($_POST['nationalite']);
						$email = verifyInput($_POST['email']);
						$tel = verifyInput($_POST['tel']);
						$correspondant = verifyInput($_POST['correspondant']);

						// $dateinsc = date("Y-m-d");

						if($niveau == "LICENCE 1"){
							$map = 750000;
						}
						if($niveau == "LICENCE 2"){
							$map = 76000;
						}
						if($niveau == "LICENCE 3"){
							$map = 825000;
						}
						if($niveau == "MASTER 1"){
							$map = 875000;
						}
						if($niveau == "MASTER 2"){
							$map = 925000;
						}

						// $solde = verifyInput($_POST['verse']);
						// $rap = $map - $solde;
						// $typeope = verifyInput($_POST['typeope']);
						$visa = verifyInput($_POST['visa']);
					}
										
					$db = Database::connect();

					$sql = $db->prepare("SELECT * FROM etudiant WHERE matricule = ?");
					$sql ->execute(array($matricule));
					$exist = $sql->fetch();

					$rap = $map - $exist['solde'];

					$insertn = $db -> prepare("UPDATE etudiant SET nom = ?, prenom = ?, datenaiss = ?, lieunaiss = ?, sexe = ?, niveau = ?, nationalite = ?, email = ?, tel= ?, correspondant = ?, lienphoto = ?, montantapayer = ?, resteapayer = ? WHERE matricule = ?"); 
					$insertn->execute(array($nom,$prenom,$datenaiss,$lieunaiss,$sexe,$niveau,$nationalite,$email,$tel,$correspondant,$photo,$map,$rap,$matricule));

					Database::disconnect();

					if($insertn == true){
						header("location:../profili.php");
					}
					else{
						echo "pb";
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