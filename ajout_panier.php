<?php
  session_start();

  $id = $_GET["id"];

  // création de la variable de session du panier s'il n'existe pas encore
  if(!isset($_SESSION['panier']))
  {
    $_SESSION['panier'] =array(); 
  }

  if(isset($_SESSION['panier'][$id]))
  {
    $_SESSION['panier'][$id]++ ; //ajoute 1 à la quantité
    $_SESSION['succes']="le produit a été ajouté au panier !" ;

  }
  else
  {
    $_SESSION['panier'][$id]=1 ; // sinon met un dans la quantité
    $_SESSION['succes']="le produit a été ajouté au panier !" ;

  }

  header("location:index.php");



?>