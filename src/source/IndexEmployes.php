<?php
require('./../view/includes/header.php');
$_SESSION['title'] = "Liste des employés";
?>
<link rel="stylesheet" href="./style.css">
<div class="container admin">
  <div class="row">
    <h1><strong>Liste des employés </strong><a href="InsertEmplyes.php" class="btn btn-success btn-lg">
        <i class="fas fa-plus"></i>Ajouter</a></h1>
        <?php
          if (!empty($_SESSION['erreur'])) {
              echo '<div class="alert alert-danger" role="alert" aria-label="Close">
                      ' . $_SESSION['erreur'] . ' 
                      </div>';
              $_SESSION['erreur'] = "";
          }
          if (!empty($_SESSION['success'])) {
            echo '<div class="alert alert-success" role="alert" aria-label="Close">
                    ' . $_SESSION['success'] . ' 
                    </div>';
            $_SESSION['success'] = "";
          }
         ?>
    <div class="table-responsive">
      <table class="table table-striped table-bordered" id="employe">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>age</th>
            <th>Sex</th>
            <th>Mail</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>

          <?php
          require('./../../core/Database/connection.php');
          $conn = (new Database())->getConnection();
          $q = $conn->prepare("SElECT * FROM employes WHERE desactivate=1");
          $q->execute();
          $employes = $q->fetchall(PDO::FETCH_OBJ);
          ?>
          <?php for ($i = 0; $i < count($employes); $i++) { ?>
            <tr>
              <td><?= $employes[$i]->id_employee; ?></td>
              <td><?= $employes[$i]->name; ?></td>
              <td><?= $employes[$i]->surname; ?></td>
              <td><?= $employes[$i]->age; ?></td>
              <td><?= $employes[$i]->sex; ?></td>
              <td><?= $employes[$i]->mail; ?></td>
              <td>
                <a class="btn btn-default" href="ViewEmployes.php?id= <?= $employes[$i]->id_employee; ?>"><i class="fas fa-eye"></i></a>

                <a class="btn btn-warning" href="UpdateEmployes.php?id=<?= $employes[$i]->id_employee; ?>"> <i class="fas fa-edit"></i></a>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $employes[$i]->id_employee; ?>"><i class="fas fa-trash"></i></button>
                <div class="modal fade" id="exampleModal<?= $employes[$i]->id_employee; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Gestion des employes</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        Voulez vous vraiment cette employé ?
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Non</button>
                        <a class="btn btn-danger" href="DeleteEmployes.php?id=<?= $employes[$i]->id_employee; ?>">Oui</a>

                      </div>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
          <?php } ?>

        </tbody>
      </table>
    </div>
  </div>
</div>
<script type="text/javascript">
  $("#employe").dataTable({});
</script>
<?php require('./../view/includes/footer.php'); ?>