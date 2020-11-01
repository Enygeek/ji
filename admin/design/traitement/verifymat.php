<?php 
    $mat = htmlspecialchars($_POST['matricule']);
    $db = Database::connect();

    $sql = $db->query("SELECT * FROM etudiant");
    //$sql ->execute(array($mat));
    $exist = $sql->fetchall();
    if($mat == $exist['matricule']){
        echo "Ce matricule existe déjà dans la base de donnée";
    }

    function verifyInput($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>

<!-- By ENOCH ZABRA 2019-->
<!-- Simulation de l'AI avec réactions automatiques en consultant la bd -->
<!-- pb :
    L2, la variable globale $_POST ne soumettra rien car bien que l'input matricule soit rempli,
    le $_POST ne fonctionera que si le sumit est clické. Du coup elle ne peut fonctionner ici.
        //Comment donc effectuer cette requête (consulter la bdd) pendant qu'il saisie ses informations ?
        //Comment récupérer la valeur d'un input sans avoir besoin de onClick sur submit ?
-->

<!-- Proposition de solution -->
<!-- Position du code : Dans le html aprèes le champ concerné, ici le matricule.
    #######################################################################################################
    p1 // Javascript puis php dans le formulaire:
    *if(click curseur rériré du champ){
        ?php
            include 'verifymat.php';
    }
    NB: Ici, la fonction verifyInput n'est pas obligatoire.
    #######################################################################################################
    Faire une imbrication de formulaire !!! Pas conseillé !!!
    **********************************************************
    *** Seulement si on veut travailler avec le sumbit ***
    .faire le formulire prenant le tout
    .puis faire du champ matricule un mini formulair avec son submit à lui
    qui redirigerais vers verifymat.php ci-dessus
    .le $mat = htmlspecialchars($_POST['matricule']); sera plutôt : $mat = htmlspecialchars($_POST['matricule']);
    Alors, ici la fonction verivyInput est obligatoire.
    .NB: vu qu'il s'agit d'un formulaire, pour le verifymat.php ne pas oublier de le required sur le 
        fichier de connection à la bd.
        Si l'on procède par include sous le input de matricule (avec le include 'verifymat.php'), dans le 
        formulaire. Cela ne sera pas nécéssaire comme pour la prémière solution proposé, il faudra  juste 
        s'assurer que le require'connectionbd.php' soit dans le formulaire.php

    ########################################################################################################
    *** Solution conseillé (avec le post)  :
    ****************************************
     
-->