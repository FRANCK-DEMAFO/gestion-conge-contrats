<?php
require('./../view/includes/header.php');
$_SESSION['title'] = "Liste des demandes";
?>


<div class="container admin">
    <div class="row">
   
        <h1 class="text-logo" style="text-align: center; margin-top: 25px; background-color: brown;">Gestion des Demandes de permissions</h1><br><br><br><br><br>
        <h1><strong> Liste des demandes</strong><a href="AddDemande.php" class="btn btn-success btn-lg "><i class="fas fa-plus"></i>Creer</a></h1>
        <div class="table-responsive">

            <table class="table table-striped table-bordered" id="request">
            <?php
                if (!empty($_SESSION['success'])) {
                    echo '<div class="alert alert-success" role="alert">
                            ' . $_SESSION['success'] . ' 
                            </div>';
                    $_SESSION['success'] = "";
                }
                if (!empty($_SESSION['erreur'])) {
                    echo '<div class="alert alert-danger" role="alert">
                            ' . $_SESSION['erreur'] . ' 
                            </div>';
                    $_SESSION['erreur'] = "";
                }
                    ?>
                <thead>
                    <tr>
                        <th>Numero</th>
                        <th>Nom</th>
                        <th>Motif</th>
                        <th>Date de creation</th>
                        <th>Date de depart</th>
                        <th>Date de retour</th>
                        <th>Statut</th>
                        <th>Actions</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once('./../../core/Database/connection.php');
                    $conn = (new Database())->getConnection();
                    $q = $conn->prepare("SElECT demande_permissions.id_request, demande_permissions.reason, demande_permissions.creation_date, demande_permissions.depart_date,
                            demande_permissions.ending_date,demande_permissions.statut,employes.name FROM demande_permissions LEFT JOIN employes 
                            ON demande_permissions.id_employee=employes.id_employee WHERE deleted=0 ");
                    $q->execute();
                    $qemploye = $conn->query('SELECT * FROM employes');


                    // $permission=$q->fetchAll(PDO::FETCH_OBJ);
                    foreach ($q as $permission) {
                        $qemploye1 = $conn->query('SELECT * FROM employes');
                    ?>
                        <tr>
                            <td><?= $permission['id_request'] ?></td>
                            <td><?= $permission['name'] ?></td>
                            <td><?= $permission['reason'] ?></td>
                            <td><?= $permission['creation_date'] ?></td>
                            <td><?= $permission['depart_date'] ?></td>
                            <td><?= $permission['ending_date'] ?></td>
                            <td><?= $permission['statut'] ?></td>
                            <td width="200px">

                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#disapprove<?= $permission['id_request'] ?>">
                                    <i class="fas fa-x circle"></i>
                                </button>
                                <div class="modal fade" id="disapprove<?= $permission['id_request'] ?>" tabindex="-1" aria-labelledby="disapproveLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="disapproveLabel">Desapprouver une demande</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Etes vous sûre de vouloir desapprouver cette demande?
                                            </div>
                                            <div class="modal-footer">
                                                <a class="btn btn-success" href="DesapprouveDemande.php?id=<?= $permission['id_request'] ?>">Oui</a>
                                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Non</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <a class="btn btn-warning" href="UpdateDemande.php?id=<?= $permission['id_request'] ?>"><i class="fas fa-edit"></i></a>

                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#approve<?= $permission['id_request'] ?> "><i class="fas fa-check cicle"></i></button>

                                <div class="modal fade" id="approve<?= $permission['id_request'] ?>" tabindex="-1" aria-labelledby="approveLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="approveLabel">Approuver une demande</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Etes-vous sûre de vouloir approuver cette demande?
                                            </div>
                                            <div class="modal-footer">
                                                <a class="btn btn-success" href="ApproveDemande.php?id=<?= $permission['id_request'] ?>"> Oui</a>
                                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Non</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete<?= $permission['id_request'] ?>">
                                    <i class="fas fa-trash"></i>
                                </button>
                                <div class="modal fade" id="delete<?= $permission['id_request'] ?>" tabindex="-1" aria-labelledby="deleteLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteLabel">Supprimer une demande</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Etes vous sûre de vouloir supprimer?
                                            </div>
                                            <div class="modal-footer">
                                                <a class="btn btn-danger" href="DeleteDemande.php?id=<?= $permission['id_request'] ?>"> Oui</a>
                                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Non</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>

                        </tr>

                    <?php
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
    $("#request").dataTable({});
</script>
<?php require('./../view/includes/footer.php'); ?>