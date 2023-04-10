<?php
session_start();
?>
<?php

    $nom = htmlspecialchars($_POST["nom"]);
    $prix = htmlspecialchars($_POST["prix"]);

    $id = $_SESSION["id"];

    require("fonctions.php");
    $bdd = connect();

    if(isset($_FILES["image2"]["name"]) && ($_FILES["image2"]["error"] == 0)){

        if(preg_match("jpeg|png", $_FILES["image2"]["name"])){
            
            $nom_image = basename($_FILES["image2"]['name']);

            $extension = substr($nom_image, strrpos($nom_image, '.' )+1);
            $nvo_nom = time() . '.' . $extension;


            $photo = 'Images/' . $nvo_nom;
            //var_dump($photo);

            $resultat = move_uploaded_file($_FILES['image2']['tmp_name'], $photo);

        }else{
            
            echo "Format du fichier invalide.";
        }
        

        

    }else{

        $photo = $_POST["image1"];

    }

    try {

        $sql = "UPDATE produit SET nom = '" . $nom . "', prix = '" . $prix . "', photo = '" . $photo . "' WHERE id = '" . $id . "';";
        $result = $bdd ->exec($sql);
    

        header("location:accueil-admin.php");

    } catch (PDOException $e) {

        echo("Erreur dans la requête <br>" . $e->getMessage());

    }


?>