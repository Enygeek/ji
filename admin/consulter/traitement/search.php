<?php
    require '../../../config/database.php';

    if(!(empty($_POST))){
        $matricule = verifyInput($_POST['matricule']);
    }

    $db = Database::connect();

    $sql = $db->prepare("SELECT * FROM etudiant WHERE matricule = ?");
    $sql ->execute(array($matricule));
    $exist = $sql->fetch();

    if($matricule == $exist['matricule']){
        session_start();
        $_SESSION['mat'] = $exist['matricule'];
        header("location:../profili.php");
    }else{
        header("location:../consulter.php");
    }

    function verifyInput($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>