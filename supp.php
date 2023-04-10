<?php

    $idBonbon = $_GET["id"];

    require("fonctions.php");
    $bdd = connect();

    try {

        $sql = "DELETE FROM produit WHERE id = " . $idBonbon . ";";
        $result = $bdd ->exec($sql);

        header("location:accueil-admin.php");
        //echo("Produit supprimé.");

    } catch (PDOException $e) {

        echo("Erreur dans la requête <br>" . $e->getMessage());

    }

?>