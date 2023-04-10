<?php
session_start();
?>
<?php

    $login = htmlspecialchars($_POST["login"]);
    $mdp = htmlspecialchars($_POST["mdp"]);
    $mdp_hashed = htmlspecialchars(md5($mdp));

    require("fonctions.php");
    $bdd = connect();

    try{

    $req =$bdd->prepare("SELECT * FROM admin WHERE login=? AND mdp=? ;");
    //$result = $bdd->query($req);
    $req->execute(array($login, $mdp_hashed));
    $rep = $req->fetch(PDO::FETCH_OBJ);

    $nb_lignes = $req->rowCount();

    }catch(Exception $e){

        echo $e->message();
    }


    if($nb_lignes != 0){

        $_SESSION["admin"] = $login;
        $_SESSION["autorisation"] = "OK";

        header("location:accueil-admin.php");

    }else{

        header("location:admin.php");

    }
?>