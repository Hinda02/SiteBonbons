<?php

    include("formAjout.php");

    $nom = htmlspecialchars($_POST["nom"]);
    $prix = htmlspecialchars($_POST["prix"]);

    $nom_image = basename($_FILES["image"]['name']);
    $chemin_destination = 'Images/' . $nom_image;
    $resultat = move_uploaded_file($_FILES['image']['tmp_name'], $chemin_destination);

    require("fonctions.php");
    $bdd = connect();

    try {

        $sql = "INSERT INTO produit(nom, prix, photo) VALUES('" . $nom . "', '" . $prix . "', '" . $chemin_destination . "');";
        $result = $bdd ->exec($sql);

        header("location:index.php");
        //echo("Produit ajouté.");

    } catch (PDOException $e) {

        echo("Erreur dans la requête <br>" . $e->getMessage());

    }