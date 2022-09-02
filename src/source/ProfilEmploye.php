<?php session_start();

if (isset($_SESSION['pass']) && ($_SESSION['login'])) {


} else {

  $_SESSION['erreur'] = "Veillez vous connecté !!!";
  header('Location: http://localhost:8090/gestion_conges_contrats\src\source\login.php');
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
    <title>Profil</title>
</head>
    <body>
        <div class="container-fluid"style="margin-top:50px;">
            <div class="row">
                <div class="col-md-9 " style="">
                    <h1 classe="page-title "><strong>Profil</strong></h1><br><br>
                    <div class="bg-light" style="border:solid gray 1px">
                        <img class="rounded-circle" src = "<?= './../../assets/images/'. $_SESSION['photo'] ; ?>" width =10% height=10% ><br>
                        <strong> Nom :</strong> <?= $_SESSION['name']?><br>
                        <strong> Prenom :</strong> <?= $_SESSION['surname']?>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal4">
                                Se Deconnecte
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel4" aria-hidden="true">
                                    <div class="modal-dialog ">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel4">Deconnexion</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal4" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Voulez-vous vraiment vous deconnecté ?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Anuler</button>
                                                <a href="./Deconnection.php"><button class="btn btn-success">Déconnection</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <ul class="nav nav-tabs" style="">
                        <li class="nav-item active"> <a href="#contrat" class="nav-link active" data-bs-toggle="tab" role="tab" aria-controls="contrat" aria-selected="true">Contrat</a> </li>
                        <li class="nav-item"> <a href="#conge" class="nav-link" data-bs-toggle="tab" role="tab" aria-controls="conge" aria-selected="fals">Congé</a> </li>
                        <li class="nav-item"> <a href="#permission" class="nav-link" data-bs-toggle="tab" role="tab" aria-controls="permission" aria-selected="fals">Permission</a> </li>
                    </ul>
                    <div class="tab-content" style="border:solid gray 1px;max-height:40%;overflow:auto ;">
                        <div class="tab-pane fade show active " id="contrat" role="tabpanel" aria-labelledby="contrat-tab">
                            <div class="row border g-0 rounded shadow-sm">
                                <div class="col p-4">
                                    <h1>Informaton sur le contrat en cour</h1>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered" >
                                            <thead>
                                                <tr>
                                                    <th>Date de création</th>
                                                    <th>Date de debut</th>
                                                    <th>Date d'aret</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    require('./../../core/Database/connection.php');
                                                    $conn = (new Database())->getConnection();
                                                    $q = $conn->prepare("SELECT * FROM contrats WHERE id_employee = '".$_SESSION["id_employee"]."' ");
                                                    $q->execute();
                                                    $contrats = $q->fetchall(PDO::FETCH_OBJ);
                                                ?>
                                                <?php for ($i = 0; $i < count($contrats); $i++) { ?>
                                                    <tr>
                                                        <td><?= $contrats[$i]->creation_date ; ?></td>
                                                        <td><?= $contrats[$i]->start_date ; ?></td>
                                                        <td><?= $contrats[$i]->end_date ; ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                        <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            Generé
                                            </button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Generé le contrat</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        ....
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Anuler</button>
                                                        <button type="button" class="btn btn-primary">Generé</button>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                                            Plus de details
                                            </button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel2">Details sur votre contrat</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="table-responsive">
                                                                <table class="table table-striped table-bordered" >
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Statut</th>
                                                                            <th>Date de modification</th>
                                                                            <th>Description</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php
                                                                           
                                                                            $q = $conn->prepare("SELECT * FROM contrats WHERE id_employee = '".$_SESSION["id_employee"]."' ");
                                                                            $q->execute();
                                                                            $contrats = $q->fetchall(PDO::FETCH_OBJ);
                                                                        ?>
                                                                        <?php for ($i = 0; $i < count($contrats); $i++) { ?>
                                                                            <tr>
                                                                                <td><?= $contrats[$i]->statut ; ?></td>
                                                                                <td><?= $contrats[$i]->modification_date ; ?></td>
                                                                                <td><?= $contrats[$i]->description ; ?></td>
                                                                            </tr>
                                                                        <?php } ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermé</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade " id="conge" role="tabpanel" aria-labelledby="conge-tab" >
                            <div class="row border g-0 rounded shadow-sm">
                                <div class="col p-4">
                                    <p><h1>Information sur vos congé</h1></p>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered" >
                                            <thead>
                                            <tr>
                                                <th>Date de debut</th>
                                                <th>Durée</th>
                                                <th>Statut</th>
                                                <th>Année</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                   
                                                    $q = $conn->prepare("SELECT * FROM conges WHERE id_employee = '".$_SESSION["id_employee"]."' ");
                                                    $q->execute();
                                                   $conges = $q->fetchall(PDO::FETCH_OBJ);
                                                ?>
                                                <?php for ($i = 0; $i < count($conges); $i++) { ?>
                                                    <tr>
                                                        <td><?=$conges[$i]->leave_start_date  ; ?></td>
                                                        <td><?=$conges[$i]->leave_duration  ; ?></td>
                                                        <td><?=$conges[$i]->statut  ; ?></td>
                                                        <td><?=$conges[$i]->annee  ; ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>  
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                        <button class="btn btn-danger">Prochain congé</button>                          
                                    </div>    
                                </div>
                            </div>
                        </div>
                   
                        <div class="tab-pane fade   " id="permission" role="tabpanel" aria-labelledby="permission-tab" style="min-height:40%;max-height:40%;overflow:auto ;">
                            <div class="row border g-0 rounded shadow-sm">
                                <div class="col p-4">
                                    <h1>Recente permission</h1>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered" >
                                            <thead>
                                            <tr>
                                                <th>Jour de la demande</th>
                                                <th>motif</th>
                                                <th>Date de debut</th>
                                                <th>Date de fin</th>
                                                <th>Statut</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    
                                                    $q = $conn->prepare("SELECT * FROM demande_permissions WHERE id_employee = '".$_SESSION["id_employee"]."' ");
                                                    $q->execute();
                                                   $permissions = $q->fetchall(PDO::FETCH_OBJ);
                                                ?>
                                                <?php for ($i = 0; $i < count($permissions); $i++) { ?>
                                                    <tr>
                                                        <td><?=$permissions[$i]->creation_date ; ?></td>
                                                        <td><?=$permissions[$i]->reason ; ?></td>
                                                        <td><?=$permissions[$i]->depart_date ; ?></td>
                                                        <td><?=$permissions[$i]->ending_date  ; ?></td>
                                                        <td><?=$permissions[$i]->statut; ?></td>
                                                    </tr>
                                                    <?php } ?>
                                            </tbody>
                                        </table>
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                        
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal3">
                                            <i class="fas fa-plus-circle"></i>Nouvelle demande
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel3" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel3">Nouvelle demande</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form class="row g-3" method="post">
                                                                <div class="col-md-6">
                                                                    <label for="inputEmail4" class="form-label">Date de debut</label>
                                                                    <input type="date" class="form-control" id="inputEmail4" name="debut" required>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label for="inputPassword4" class="form-label">Date de fin</label>
                                                                    <input type="date" class="form-control" id="inputPassword4" name="fin" required>
                                                                </div>
                                                                <div class="col-12">
                                                                    <label for="inputAddress" class="form-label">Motif</label>
                                                                    <input type="text" class="form-control" id="inputAddress" name="motif" required>
                                                                </div>
                                                                <div class="modal-footer col-12">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Anuler</button>
                                                                    <button type="submit" class="btn btn-primary">Enregistré</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 "> 
                    <div style=" text-align:center"><br>
                        <img class="rounded-circle" src = "<?= './../../assets/images/'. $_SESSION['photo'] ; ?>" width =45% height=25% ><br><br>
                         <strong><?= $_SESSION['name']?>
                            <?= $_SESSION['surname']?></strong>
                        <hr>
                        <i class="fas fa-search"></i> <input type="search" placeholder="recherche"> <br>
                        <hr>
                        permissions recente
                        <hr><br><br>
                        <hr><br>
                        Prochain congé
                        <hr><br><br>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
<?php require('./../view/includes/footer.php');?>