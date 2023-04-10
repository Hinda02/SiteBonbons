<?php
session_start();
?>
<?php
  include("header.php");
?>

<?php

    $idBonbon = $_GET["id"];

    require("fonctions.php");
    $bdd = connect();

    $sql = "SELECT * FROM produit WHERE id = '" . $idBonbon . "';";
    $result = $bdd->query($sql);
    $produit = $result->fetch(PDO::FETCH_OBJ);

    $_SESSION["id"] = $idBonbon;

    echo '<form action="modif2.php" method="post" enctype="multipart/form-data">
    
    <div class="mb-3">
        <label class="form-label">Nom du produit</label>
        <input type="text" name="nom" class="form-control" value="' . $produit->nom . '">
    </div>
    <div class="mb-3">
        <label class="form-label">Prix du produit</label>
        <input type="text" name="prix" class="form-control" value="' . $produit->prix . '">
    </div>
    <div class="mb-3">
        <label class="form-label">Image du produit </label>
        <input type="text" name="image1" class="form-control" value="' . $produit->photo . '" readonly>
    </div>
    <div class="mb-3 form-check">
        <input type="file" name="image2" accept="image/png, image/jpeg">
    </div>

    <button type="submit" name="enreg" class="btn btn-primary">Valider les modifications</button>

    </form>';
?>

<?php
  include("footer.php");
?>