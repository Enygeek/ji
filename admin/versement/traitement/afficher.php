<?php 

    //require '../config/database.php';				
    $db = Database::connect();

    $sql = $db->prepare("SELECT * FROM etudiant WHERE id_etudiant = ?");
    $sql ->execute(array($_SESSION['id']));
    $exist = $sql->fetch();

    $id = $exist['id_etudiant'];

 ?>