<?php
session_start();

if($_SESSION["autorisation"] == "OK"){
?>
<?php
  include("header.php");
?>

<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
  <a class="navbar-brand" href="index.php"><img src="Images\logo1.png" class="rounded float-start" alt="feuille" height ="55" width="150"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">

        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Accueil</a>
            </li>
            
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Options
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="formAjout.php">Ajouter</a></li>
                <li><a class="dropdown-item" href="choixSupp.php">Supprimer</a></li>
                <li><a class="dropdown-item" href="choixModif.php">Modifier</a></li>
            </ul>
            
        </ul>

        <form class="d-flex" role="search" action="recherche.php" method="post">
            <input class="form-control me-2" name="choice" type="search" placeholder="Recherche" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Rechercher</button>
        </form>
    </div>
  </div>
</nav>

<?php

    include("fonctions.php");

    $connect = connect();

    $sql = "SELECT * FROM produit;";

    $result = $connect->query($sql);

    while ($produit = $result->fetch(PDO::FETCH_OBJ)) {
        echo '<div class="card" style="width: 18rem;">
        <img src="'.$produit->photo.'" class="card-img-top" >
        <div class="card-body">
          <h5 class="card-title">'.$produit->nom.'</h5>
          <p class="card-text">'.$produit->prix.'</p>
          <a href="modif1.php?id='.$produit->id.'"  class="btn btn-success">Modifier</a>
        </div>
      </div>';
    }

?>

<?php
}else{
  header("location:admin.php");
}

  include("footer.php");
?>