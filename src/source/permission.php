<?php
require('./../view/includes/header.php');
$_SESSION['title'] = "Liste des permissions";
?>


<span class="glyphicon glyphicon-cutlery"></span></h1>
<div class="container admin">
    <div class="row">
        <h1 class="text-logo" style="text-align: center; margin-top: 25px; background-color: brown;">Gestion des permissions</h1><br><br><br><br><br>

        <h1><strong> Liste des permissions</strong></h1>
        <div class="table-responsive">
            <table class="table table-striped table-bordered" id="permission">
                <thead>
                    <tr>
                        <th>Numero</th>
                        <th>Nom</th>
                        <th>Motif</th>
                        <th>Date de depart</th>
                        <th>Date de retour</th>
                        <th>Actions</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once('./../../core/Database/connection.php');
                    $conn = (new Database())->getConnection();
                    $q = $conn->prepare("SElECT demande_permissions.id_request, demande_permissions.reason, demande_permissions.creation_date, demande_permissions.depart_date,
                            demande_permissions.ending_date,employes.name FROM demande_permissions LEFT JOIN employes 
                            ON demande_permissions.id_employee=employes.id_employee WHERE statut='oui' AND deleted=0 ");
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
                            <td><?= $permission['depart_date'] ?></td>
                            <td><?= $permission['ending_date'] ?></td>
                            <td width=120px>

                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deletePermission<?= $permission['id_request'] ?>">
                                    <i class="fas fa-trash"></i>
                                </button>
                                <div class="modal fade" id="deletePermission<?= $permission['id_request'] ?>" tabindex="-1" aria-labelledby="deletePermissionLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deletePermissionLabel">Supprimer une permission</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Etes vous sûre de vouloir supprimer?
                                            </div>
                                            <div class="modal-footer">
                                                <a class="btn btn-success" href="deletePermission.php?id=<?= $permission['id_request'] ?>"> Oui</a>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Non</button>
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
    $("#permission").dataTable({});
</script>
<?php require('./../view/includes/footer.php'); ?>