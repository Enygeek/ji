<?php 

	session_start();
	ob_start();
	require '../../../config/database.php';

	if(isset($_POST)){

		$mail = verifyInput($_POST['mail']);
		$dateope = date("Y-m-d");
		$montant = verifyInput($_POST['montant']);
		$visa = verifyInput($_POST['visa']);

	}

$db = Database::connect();


$sql = $db ->prepare("SELECT * FROM etudiant WHERE email = ?");
$sql ->execute(array($mail));
$verify = $sql ->fetch();

$id_etu = $verify["id_etudiant"];

if($mail == $verify['email']){
	$solde = $verify['solde'] + $montant;
	$rap = $verify['montant_a_payer'] - $solde;
}else{
	header("location:../index.php");
}

if($verify['reste_a_payer'] == 0){
	//echo "l'étudiant possédant ce matricule a déjà soldé";
	header("location:../vsolde.php");
	//Afficher une zone js pour dire que l'étudiant possédant ce matricule a déjà soldé
}else{
	if($solde > $verify['montant_a_payer']){
		//echo "Solde ne peux être supérieur au motant à payer";
		header("location:../vsup.php");
	}
	else{
	$insert = $db -> prepare("INSERT INTO payement(id_etudiant, date_pay, montant, visa) 
							VALUES (?,?,?,?)");
	$insert ->execute(array($id_etu,$dateope,$montant,$visa));


	$insertn = $db -> prepare("UPDATE etudiant SET solde = ?, reste_a_payer = ? WHERE email = ?"); 
	$insertn->execute(array($solde,$rap,$mail));

	Database::disconnect();

	header("location:success.php");
	}
}

Database::disconnect();


function verifyInput($data){
	$data = trim($data);
	$data = stripcslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

 ?>