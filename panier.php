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

    <h2> Votre Panier </h2>

<?php

    if(!empty($_SESSION['panier'])){
        
        require("fonctions.php");
        $connect = connect();
        $totalHT = 0;
    
        echo '<table class="table table-striped">';
        echo '<tr>
            <th scope="col">Produit</th>
            <th scope="col">Prix Unit.</th>
            <th scope="col">Quantité</th>
            <th scope="col">Montant</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>';

        foreach($_SESSION['panier'] as $id=>$quantite ){

            $sql = "SELECT * FROM produit
            WHERE id =". $id .";";

            $result = $connect->query($sql);
        
            $produit = $result->fetch(PDO::FETCH_OBJ);
            $prix = $produit->prix;
            $montant = $prix * $quantite;
            $totalHT+= $montant;

            echo '<tr>
                    <td class="table-primary">'.$produit->nom.'</td>
                    <td class="table-info">'.$prix.'</td>
                    <td class="table-success">'.$quantite.'</td>
                    <td class="table-danger">'.$montant.'</td>
                    <td class="table-warning"><a class="btn btn-success" aria-current="page" href="ajoutpanier2.php?id='.$id.'">+</a></td>
                    <td class="table-secondary"><a class="btn btn-danger" aria-current="page" href="supppanier2.php?id='.$id.'">-</a></td>
                    
                  </tr>';
        }

        $tva = $totalHT * 0.15;
        $totalTTC = $totalHT * (1+0.15);

        echo '<br><table class="table table-success table-striped">
            <tr>
                <th scope="row">Total HT</th>
                <td>'. $totalHT .'</td>
            </tr>
            <tr>
                <th scope="row">TVA (15%)</th>
                <td>'. $tva .'</td>
            </tr>
            <tr>
                <th scope="row">Frais de port</th>
                <td> 5€ </td>
            </tr>
            <tr>
                <th scope="row">TOTAL TTC</th>
                <td>'. ($totalTTC + 5) .'</td>
            </tr>
        </table>
        <a class="btn btn-primary d-flex" aria-current="page" href="index.php">Continuer mes achats</a><br>
        <a class="btn btn-success d-flex" aria-current="page" href="panier.php">Payer</a><br>
        <a class="btn btn-warning d-flex" aria-current="page" href="vider-panier.php">Vider le panier</a>';
        
    }else{
        echo "Panier Vide.";
    }


?>