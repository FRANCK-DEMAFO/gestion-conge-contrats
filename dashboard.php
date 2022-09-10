<?php
require('./../view/includes/header.php');
$_SESSION['title'] = "Tableau de bord";
require('./../../core/Database/connection.php');
$conn = (new Database())->getConnection();
$q = $conn->prepare("SElECT * FROM employes WHERE desactivate=1");
$q->execute();
$employes = $q->fetchall(PDO::FETCH_OBJ);
$nb_employe = count($employes);

$q = $conn->prepare("SElECT * FROM conges WHERE disable=1");
$q->execute();
$conges = $q->fetchall(PDO::FETCH_OBJ);
$nb_conge = count($conges);

$q = $conn->prepare("SElECT * FROM contrats WHERE deleted=0");
$q->execute();
$contrats = $q->fetchall(PDO::FETCH_OBJ);
$nb_contrat = count($contrats);

$q = $conn->prepare("SElECT * FROM contrats WHERE statut='actif'");
$q->execute();
$contrats1 = $q->fetchall(PDO::FETCH_OBJ);
$nb_contrat1 = count($contrats1);

$q = $conn->prepare("SElECT * FROM contrats WHERE statut='resilié'");
$q->execute();
$contrats2 = $q->fetchall(PDO::FETCH_OBJ);
$nb_contrat2 = count($contrats2);

$q = $conn->prepare("SElECT * FROM demande_permissions WHERE deleted=0");
$q->execute();
$request = $q->fetchall(PDO::FETCH_OBJ);
$nb_demande = count($request);

$q = $conn->prepare("SElECT * FROM demande_permissions WHERE statut='oui'");
$q->execute();
$request1 = $q->fetchall(PDO::FETCH_OBJ);
$nb_demande1 = count($request1);

$q = $conn->prepare("SElECT * FROM demande_permissions WHERE statut='non'");
$q->execute();
$request2 = $q->fetchall(PDO::FETCH_OBJ);
$nb_demande2 = count($request2);
?>
<div class="container-fluid">
    <div class="pagetitle"><br><br><br>
      <h1 class="text-logo" style="text-align: center; margin-top: -10px; background-color: brown;">Tableau de bord<br><br></h1><br><br>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./../../index.php">Accueil</a></li>
                <li class="breadcrumb-item active">Tableau de bord</li>
            </ol>
        </nav>
    </div>
    <div class="col-lg-12">
        <div class="row">

            <div class="col-xxl-3 col-md-6">
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">Employés</h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="ps-3">
                                <strong style="font-size:4em; color:brown"><?= $nb_employe ?></strong>
                            </div>
                        </div>
                    </div>
                </div><br>

                <div class="card info-card customers-card">
                    <div class="card-body">
                        <h5 class="card-title">Contrats</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="fas fa-book"></i>
                            </div>
                            <div class="ps-3">
                                <strong style="font-size:4em; color:brown"><?= $nb_contrat ?></strong>
                                <span class="text-success small pt-1 fw-bold"> <?= $nb_contrat1 ?> actifs </span> |
                                <span class="text-danger small pt-1 fw-bold"> <?= $nb_contrat2 ?> resiliés</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-md-6">
                <div class="card info-card revenue-card">
                    <div class="card-body">
                        <h5 class="card-title">Demandes de permission</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="fas fa-calendar"></i>
                            </div>
                            <div class="ps-3">
                                <strong style="font-size:4em; color:brown"><?= $nb_demande ?></strong>
                                <span class="text-success small pt-1 fw-bold"> <?= $nb_demande1 ?> approuvées</span> |
                                <span class="text-danger small pt-1 fw-bold"> <?= $nb_demande2 ?> rejétées</span>
                            </div>
                        </div>
                    </div>
                </div><br>

                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">Congés</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="fas fa-clipboard"></i>
                            </div>
                            <div class="ps-3">
                                <strong style="font-size:4em; color:brown"><?= $nb_conge ?></strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><br><br>
</div>
<?php require('./../view/includes/footer.php'); ?>