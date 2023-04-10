<?php
    session_start();
    include("header.php");

    $id = $_GET["id"];

    if($_SESSION["panier"][$id] == 1){
        unset($_SESSION["panier"][$id]);
    }else{
        $_SESSION["panier"][$id]--;
    }
    

    header("location:panier.php");

?>