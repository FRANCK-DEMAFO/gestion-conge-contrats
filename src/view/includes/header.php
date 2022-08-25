<?php session_start();

if (isset($_SESSION['pass']) && ($_SESSION['login'])) {
} else {

  $_SESSION['erreur'] = "Veillez vous connecté !!!";
  header('Location: http://localhost:8090/gestion_conges_contrats\src\source\login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="./../../vendor/jquery/datatables.min.css">
  <script type="text/javascript" src="./../../vendor/jquery/datatables.js"></script>
  <link rel="stylesheet" href="./../../vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="./../../vendor/font/css/all.min.css">
  <link rel="stylesheet" href="./../../assets/css/style.css">
  <script src="./../../vendor/tinymce/js/tinymce/tinymce.min.js"></script>
  <script type="text/javascript">
    tinymce.init({
      selector: '#mytextarea'
    });
  </script>
  <title><?= $_SESSION['title'];  ?></title>
</head>

<body>
  <header>
    <nav class="navbar navbar-light bg-dark">
      <div class="container-fluid">
        <button class="navbar-toggler boos " type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel" style="width: 250px;">
          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close" style="margin-left: 200px; height:40px;width: 40px;background-color: rgb(202, 30, 30);"></button>
          <div class="offcanvas-header">

            <h5 class="offcanvas-title" id="offcanvasNavbarLabel"></h5>
            <img src="./../../assets/images/cropped-logo-uni2grow-1.png" alt="">
          </div><br>
          <hr>
          <ul class="navlist">

            <li class="navitems"><a href="./../../index.php" class="navlink"><i class="fas fa-house"></i>Accueil</a></li>
            <li class="navitems"><a href="./../source/dashboard.php" class="navlink"><i class="fa fa-list"></i>Tableau de Bord</a></li>
            <li class="navitems"><a href="./../source/IndexEmployes.php" class="navlink"><i class="fa fa-users"></i>Employes</a></li>
            <li class="navitems"><a href="./../source/index.php" class="navlink"><i class="fas fa-clipboard"></i>conges</a></li>
            <li class="navitems"><a href="./../source/IndexContrat.php" class="navlink"><i class="fas fa-book"></i>Contrats</a></li>
            <li class="navitems"><a href=" ./../source/IndexModel.php" class="navlink"><i class="fa fa-external-link"></i>Models de contrats</a></li>
            <li class="navitems"><a href="./../source/IndexTypes.php" class="navlink"><i class="fas fa-book"></i>Types de contrat</a></li>

            <li class="navitems"><a href="./../source/IndexDemande.php" class="navlink"><i class="fas fa-calendar"></i>Demande Permission</a></li>
            <li class="navitems"><a href="./../source/permission.php" class="navlink"><i class="fas fa-book"></i>Permission</a></li>

          </ul>
        </div>
        <div class="dropdown">
          <a class="btn btn-secondary boss bg-transparent" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="./../../assets/images/photo.png" class="rounded-circle" alt="" width="50px" height="50px">
            <?= $_SESSION['mail'] ?>
          </a>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <li class="dropdown-header">
              <h5><?= ($_SESSION['name']) ?> <?= ($_SESSION['surname']) ?> </h5>
            </li>
            <li class="list-group-item"><a class="dropdown-item" href="#"><i class="fas fa-user"></i>Mon profil profil</a></li>
            <li class="list-group-item"><a class="dropdown-item" name="deconnection" href="Deconnection.php"><i class="fa fa-external-link"></i>Deconnexion</a></li>
          </ul>
        </div>
      </div>
    </nav>
  </header>