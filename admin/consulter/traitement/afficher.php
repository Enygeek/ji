<?php 
			
    $db = Database::connect();

    $sql = $db->prepare("SELECT * FROM etudiant WHERE matricule = ?");
    $sql ->execute(array($_SESSION['mat']));
    $exist = $sql->fetch();
//Afficher toutes les opérations WHERE matricule= verifyInput(POST["matricule"]);
    $id = $exist['prenom'];



    $db = Database::connect();
    $sql = $db ->prepare('SELECT * FROM operation WHERE matricule = ?');
    $sql->execute(array($_SESSION['mat']));

?>