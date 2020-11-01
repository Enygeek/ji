<?php
    require "../../config/database.php";

    if(isset($_POST)){
        $username = verifyInput($_POST['username']);
        $password = verifyInput($_POST['password']);
    }

    $db = Database::connect();

    $verifi = $db ->prepare("SELECT * FROM admin WHERE username = ? AND password = ?");
    $verifi ->execute(array($username,$password));
    $exist = $verifi ->fetch();

    if ($username == $exist['username'] AND $password == $exist['password']){
		session_start();
		$_SESSION['user'] = $exist['id_admin'];
        header("location:../adminspace.php");
    }else{
		header("location:../index.php");
    }

    function verifyInput($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>