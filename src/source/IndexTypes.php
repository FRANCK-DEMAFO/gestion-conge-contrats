<?php
require('./../view/includes/header.php');
$_SESSION['title'] = "Liste des type de contrat";

?>

<div class="container admin">
  <div class="row">
    <h1 class="text-logo" style="text-align: center; margin-top: -10px; background-color: brown;">Gestion des types de Contrats <br></h1><br><br><br><br>

    <h1><strong>Liste des types de contrats </strong><a href="InsertTypes.php" class="btn btn-success btn-lg">
        <i class="fas fa-plus"></i> Ajouter</a></h1>
    <?php
    if (!empty($_SESSION['erreur'])) {
      echo '<div class="alert alert-success" role="alert">
                                        ' . $_SESSION['erreur'] . ' 
                                        </div>';
      $_SESSION['erreur'] = "";
    }
    ?>
    <div class="table-responsive">
      <table class="table table-striped table-bordered" id="contract_type">
        <thead>
          <tr>
            <th>ID</th>
            <th>nom type contrat</th>
            <th>description</th>
            <th> date de creation</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          require('./../../core/Database/connection.php');
          $conn = (new Database())->getConnection();
          $q = $conn->prepare("SElECT * FROM type_contrats WHERE suppression=1");
          $q->execute();
          //$type_contrats = $q->fetchall(PDO::FETCH_OBJ);
          foreach ($q as $type_contrat) {
          ?>
            <tr>
              <td><?= $type_contrat['id_contract_type'] ?></td>
              <td><?= $type_contrat['contract_type_name'] ?></td>
              <td><?= $type_contrat['description'] ?></td>
              <td><?= $type_contrat['creation_date'] ?></td>
              <td>
                <a class="btn btn-default" href="ViewTypes.php?id=<?= $type_contrat['id_contract_type'] ?>"><i class="fas fa-eye"></i></a>

                <a class="btn btn-warning" href="UpdateTypes.php?id=<?= $type_contrat['id_contract_type'] ?>"><i class="fas fa-edit"></i></a>

                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $type_contrat['id_contract_type'] ?>"><i class="fas fa-trash"></i></button>
                <div class="modal fade" id="exampleModal<?= $type_contrat['id_contract_type'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Gestion types contrats</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        Voulez vous vraiment supprimer ?
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Non</button>
                        <a class="btn btn-danger" href="DeleteTypes.php?id=<?= $type_contrat['id_contract_type'] ?>">Oui</a>

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
  $("#contract_type").dataTable({});
</script>
<?php require('./../view/includes/footer.php'); ?>