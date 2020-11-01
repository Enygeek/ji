<?php
    require '../../../config/database.php';

    if(!(empty($_POST))){
        $matricule = verifyInput($_POST['mail']);
    }

    $db = Database::connect();

    $sql = $db->prepare("SELECT * FROM etudiant WHERE email = ?");
    $sql ->execute(array($matricule));
    $exist = $sql->fetch();

    if($matricule == $exist['matricule']){
        session_start();
        $_SESSION['id'] = $exist['id_etudiant'];
        $_SESSION['mat'] = $exist['matricule'];
        header("location:../enrer_verse.php");
    }else{
        header("location:../versement.php");
    }

    function verifyInput($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>