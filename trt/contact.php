<?php

require '../config/database.php';

    if (isset($_POST)) {

        $nom = verifyInput($_POST['name']);
        $mail = verifyInput($_POST['email']);
        $sujet = verifyInput($_POST['subject']);
        $message = verifyInput($_POST['message']);

    }
    
    $db = Database::connect()

    // ********************************* INSERTION DANS LA BD **********************************  //


    $insert = $db->prepare("INSERT INTO `contact`(`nom`, `email`, `sujet`, `commentaire`) VALUES (?,?,?,?)");
    $insert -> execute(array($nom, $mail, $sujet, $message));


    // *************************** </FIN INSERTION DANS LA BD> ********************************  //

    if ($insert) {
        Database::disconnect();
        header("location:../");
    }
        
}


function verifyInput($data)
{
	$data = trim($data);
	$data = stripcslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
