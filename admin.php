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
              <a class="nav-link active" aria-current="page" href="admin.php">Admin</a>
            </li>
        </ul>

        <form class="d-flex" role="search" action="recherche.php" method="post">
            <input class="form-control me-2" name="choice" type="search" placeholder="Recherche" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Rechercher</button>
        </form>
    </div>
  </div>
</nav>

    <form action="verif.php" method="post">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Login</label>
        <input type="text" class="form-control" name="login" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" name="mdp" id="exampleInputPassword1">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <a class="btn btn-primary" aria-current="page" href="index.php">Annuler</a>
    </form>

<?php
    include("footer.php");
?>