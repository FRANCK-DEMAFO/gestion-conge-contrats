<?php
require('./../view/includes/header.php');
$_SESSION['title'] = "Liste des model de contrat";
?>


<div class="container ">
  <div class="row">
    <h1 class="titre" style="text-align: center; margin-top: -10px; background-color: brown;"><strong>Models de Contrats</strong></h1><br><br><br><br>

    <h2><strong> Liste des Models </strong><a href="InsertModel.php" class="btn btn-success btn-lg"><i class="fas fa-plus"></i> Ajouter</a>
    </h2>
    <div class="table-responsive">
      <table class="table table-striped table-bordered" style="border-color: black;" id="model">
        <thead>
          <tr>
            <th>Id</th>
            <th>Nom du Type de Contrat</th>
            <th>Nom du Model de Contrat</th>
            <th>Date de Creation</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>

          <?php

          require('./../../core/Database/connection.php');
          $conn = (new Database())->getConnection();
          $q = $conn->prepare("SELECT models_contrats.id_model, models_contrats.model_name, models_contrats.model, models_contrats.deleted, models_contrats.date_creation,
        type_contrats.contract_type_name, type_contrats.id_contract_type FROM models_contrats LEFT JOIN type_contrats ON models_contrats.id_type_contrat=type_contrats.id_contract_type WHERE deleted=1");
          $q->execute();
          foreach ($q as $models_contrat) {
          ?>
            <tr>
              <td><?= $models_contrat['id_model'] ?> </td>
              <td><?= $models_contrat['id_contract_type'] ?> </td>
              <td><?= $models_contrat['model_name'] ?> </td>
              <td><?= $models_contrat['date_creation'] ?></td>
              <td width=180>
                <a class="btn btn-light" href="ViewModel.php?id=<?= $models_contrat['id_model'] ?>"><i class=" fas fa-eye"></i></a>

                <a class="btn btn-warning" href="UpdateModel.php?id=<?= $models_contrat['id_model'] ?>"> <i class=" fas fa-edit"></i></a>



                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $models_contrat['id_model'] ?>"><i class="fas fa-trash"></i></button>
                <div class="modal fade" id="exampleModal<?= $models_contrat['id_model'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Gestion Models de Contrats</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        Voulez vous vraiment supprimer le model ?
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Non</button>
                        <a class="btn btn-danger" href="DeleteModel.php?id=<?= $models_contrat['id_model'] ?>">Oui</a>

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
  $("#model").dataTable({});
</script>
<?php require('./../view/includes/footer.php');  ?>