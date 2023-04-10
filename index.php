<?php
  session_start();
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
              <a class="nav-link active" aria-current="page" href="admin.php">Admin</a>
            </li>
        </ul>

        <a class="btn btn-success d-flex me-3" aria-current="page" href="panier.php">Panier</a>

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

    if(!empty($_SESSION['succes']))
    {
      ?>
        <div class="alert alert-success" role="alert" data-auto-dismiss="2000">
            <?php echo $_SESSION['succes']; 
                  unset($_SESSION['succes']); 	
            ?>
        </div>

      <?php
    }


    while ($produit = $result->fetch(PDO::FETCH_OBJ)) {
        echo '<div class="card" style="width: 18rem;">
        <img src="'.$produit->photo.'" class="card-img-top" >
        <div class="card-body">
          <h5 class="card-title">'.$produit->nom.'</h5>
          <p class="card-text">'.$produit->prix.'</p>
          <a href="ajout_panier.php?id=' . $produit->id . '" class="btn btn-primary">Ajouter au panier</a>
        </div>
      </div>';
    }

?>

<?php
  include("footer.php");
?>