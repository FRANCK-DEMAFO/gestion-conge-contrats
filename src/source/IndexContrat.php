<?php 
require('./../view/includes/header.php');
$_SESSION['title'] = "Liste des contrats"; 
 ?>

<h1 class="text-logo"><span class="glyphicon glyphicon-cutlery"></span>
    <span class="glyphicon glyphicon-cutlery"></span>
</h1>
<div class="container admin">
    <div class="row">
        <h1 class="text-logo" style="text-align: center; margin-top: -10px; background-color: brown;">Gestion des Contrats <br></h1><br><br><br><br>
        <h1><strong> liste des contrats </strong><a href="Ajoutercontrat.php" class="btn btn-success btn-lg "><i class="fas fa-plus"></i>ajouter</a>
        </h1>
    <div class="table-responsive">
        <table class="table table-striped table-bordered" id="contract">
            <thead>
                <tr>
                    <th>numero du contrat</th>
                    <th>date de debut</th>
                    <th>date de creation</th>
                    <th>description</th>
                    <th>date de modification</th>
                    <th>de de fin</th>
                    <th>statut</th>
                    <th>action</th>

                </tr>
            </thead>
            <tbody>
                <?php
                require('./../../core/Database/connection.php');
                $conn = (new Database())->getConnection();
                $q = $conn->prepare("SELECT contrats.id_contract, contrats.start_date, contrats.end_date, contrats.description, contrats.creation_date, contrats.modification_date, contrats.statut,
                 contrats.deleted FROM contrats WHERE contrats.deleted= 0");
                $q->execute();
                // $contrats = $q->fetchAll(PDO::FETCH_OBJ);
                foreach ($q as $contrat) {
                ?>
                    <tr>

                        <td> <?= $contrat['id_contract'] ?> </td>
                        <td> <?= $contrat['start_date'] ?></td>
                        <td> <?= $contrat['modification_date'] ?></td>
                        <td> <?= $contrat['description'] ?> </td>
                        <td> <?= $contrat['creation_date'] ?></td>
                        <td> <?= $contrat['end_date'] ?></td>
                        <td> <?= $contrat['statut'] ?> </td>

                        <td width=170>
                            <a class="btn btn-default" href="ViewContrat.php?id= <?= $contrat['id_contract'] ?>"><i class="fas fa-eye"></i></a>
                            <a class="btn btn-warning" href="EditContrat.php?id= <?= $contrat['id_contract'] ?>"><i class="fas fa-edit"></i></a>

                            <!-- supprimer -->
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $contrat['id_contract'] ?>"><i class="fas fa-trash"></i></button></h4>
                            <div class="modal fade" id="exampleModal<?= $contrat['id_contract'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Suppression du contrat</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-dialog modal-dialog-scrollable">
                                            Voulez-vous vraiment supprimer?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Non</button>
                                            <a class="btn btn-danger" href="DeleteContrat.php?id=<?= $contrat['id_contract'] ?>">Oui</a>
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
  $("#contract").dataTable({});
</script>

<?php require('./../view/includes/footer.php'); ?>