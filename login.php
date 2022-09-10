<?php
session_start();

if (isset($_POST['login'])) {
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    if (!empty($user) && !empty($pass)) {
        require('./../../core/Database/connection.php');
        $conn = (new Database())->getConnection();
        $q = $conn->prepare("SELECT * FROM `employes` WHERE login  ='$user'");
        $q->execute();

        if ($q->rowCount() > 0) {
            $data = $q->fetchall();
            $_SESSION['pass'] = $data[0]['password'];
            if ($_SESSION['pass'] == $pass) {
                $_SESSION['id_employee'] = $data[0]['id_employee'];
                $_SESSION['role'] = $data[0]['id_role'];
                $_SESSION['mail'] = $data[0]['mail'];
                $_SESSION['name'] = $data[0]['name'];
                $_SESSION['photo'] = $data[0]['photo'];
                $_SESSION['surname'] = $data[0]['surname'];
                $_SESSION['login'] = $data[0]['login'];
                //  $_SESSION['erreur'] = "connexion reussi a ". $_SESSION['id_employee'];
                header('Location:dashboard.php');
            } else {
                $_SESSION['erreur'] = "Mots de passe incorrect !";
            }
        } else {
            $_SESSION['erreur'] = "Nom d'utilisateur incorrect !";
        }
    } else {
        $_SESSION['erreur'] = "Veuillez remplire les champs !";
    }
}



?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../../vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./../../vendor/font/css/all.min.css">
    <link rel="stylesheet" href="./../../assets/css/style.css">

    <title>Login</title>
</head>

<body>
    
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><img src="./../../assets/images/cropped-logo-uni2grow-1.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a style="margin-left:600px;" class="nav-link" aria-current="page" href="./../../index.php">Acceuil</a>
                        <a class="nav-link active bg-danger" href="login.php">Connectez-vous</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6 d-flex flex-column align-items-center justify-content-center">
                <div class="card mb-3">
                    <div class="card-body">

                        <div class="pt-4 pb-2">
                            <h2 class="card-title text-center ">Connectez-vous</h2><br><br>
                        </div>
                        <form method="post" action="" class="row g-3 needs-validation">
                            <?php
                            if (!empty($_SESSION['erreur'])) {
                                echo '<div class="alert alert-danger" role="alert" aria-label="Close">
                                        ' . $_SESSION['erreur'] . ' 
                                        </div>';
                                $_SESSION['erreur'] = "";
                            }
                            ?>
                            <div class="col-12">
                                <label for="yourUsername" class="form-label">Nom d'utilisateur</label>
                                <input type="text" name="user" class="form-control" id="user" required>
                            </div>

                            <div class="col-12">
                                <label for="yourPassword" class="form-label">Mot de passe</label>
                                <input type="password" name="pass" class="form-control" id="pass" required>
                            </div>

                            <div class="col-12">
                                <button class="btn btn-danger w-100" type="submit" name="login">Se connecter</button>
                            </div>
                            <div class="col-12">
                                <p class="small mb-0" style="color:  rgb(61, 61, 63);">Vous n'avez pas de compte ? <a style="color:  rgb(61, 61, 63);" href="InsertEmplyes.php">Inscrivez-vous</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require('./../view/includes/footer.php'); ?>