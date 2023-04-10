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
              <a class="nav-link active" aria-current="page" href="accueil-admin.php">Admin</a>
            </li>
        </ul>

        <form class="d-flex" role="search" action="recherche.php" method="post">
            <input class="form-control me-2" name="choice" type="search" placeholder="Recherche" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Rechercher</button>
        </form>
    </div>
  </div>
</nav>

<?php

    $bonbon = htmlspecialchars(strtolower($_POST["choice"]));

    include("fonctions.php");

    $connect = connect();

    $sql = "SELECT * FROM produit
            WHERE lower(nom) LIKE ('%". $bonbon ."%');";

    $result = $connect->query($sql);
 
    $produit = $result->fetch(PDO::FETCH_OBJ);
    
    if($produit){
      echo '<div class="card" style="width: 18rem;">
      <img src="'.$produit->photo.'" class="card-img-top" >
      <div class="card-body">
        <h5 class="card-title">'.$produit->nom.'</h5>
        <p class="card-text">'.$produit->prix.'</p>
        <a href="#" class="btn btn-primary">Acheter</a>
      </div>
    </div>';
    }
    else
    {
      echo "Aucun bonbon de ce nom n'a été trouvé.";
    }

?>

<?php
  include("footer.php");
?>