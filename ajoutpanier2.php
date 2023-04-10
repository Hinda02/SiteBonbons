<?php
    session_start();
    include("header.php");

    $id = $_GET["id"];

    $_SESSION["panier"][$id]++;

    header("location:panier.php");

?>