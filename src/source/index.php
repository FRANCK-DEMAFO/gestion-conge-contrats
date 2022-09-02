<?php

$_SESSION['title'] = "Liste des congés";
require_once('./../view/includes/header.php');

?>

<div class="container">
  <div class="row">
    <h1 class="text-logo" style="text-align: center; margin-top: -10px; background-color: brown;">Gestion des Conges</h1><br><br><br><br>
    <h1><strong>Liste des conges</strong><a href="#" class="btn btn-success btn-lg" data-bs-toggle="modal" data-bs-target="#exampleModala">
        <i class="fas fa-plus"></i>Ajouter</a>
      <button style="height:50px;width:100px;" class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample">
        <i class="fas fa-book"></i>Archives
      </button>
      <div style="min-height: 120px;">
        <div class="collapse collapse-vertical" id="collapseWidthExample">
          <div class="card card-body" style="width: 300px;">
            <form method="POST" action="Archives.php">
              <div class="form-group">
                <label for="name">
                  <h6>Veillez entrer l'année </h6>
                </label>
                <script>
                  document.querySelector("input[type=number]")
                    .oninput = e => console.log(new Date(e.target.valueAsNumber, 0, 1))
                </script>
                <input class="form-control" type="number" placeholder="yy" min="2022" max="2100" id="annee" name="annee" required>
                <button class="btn btn-success" type="submit" name="envoyer">envoyer</button>
                <button class="btn btn-primary" data-bs-dismiss="modal"><a href="index.php">retour</a></button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <button class="btn btn-info"><a href="update_leaves.php">Actualiser</a></button>
    </h1>
    <div class="table-responsive">
      <table class="table table-striped table-bordered" id="leave">
        <?php
        if (!empty($_SESSION['erreur'])) {
          echo '<div class="alert alert-danger" role="alert">
                                        ' . $_SESSION['erreur'] . ' 
                                        </div>';
          $_SESSION['erreur'] = "";
        }
        if (!empty($_SESSION['success'])) {
          echo '<div class="alert alert-success" role="alert">
                                      ' . $_SESSION['success'] . ' 
                                      </div>';
          $_SESSION['success'] = "";
        }

        ?>
        <thead>
          <tr>
            <th>ID</th>
            <th style="text-align: center;"> Nom des employes</th>
            <th style="text-align: center;">Date de debut</th>
            <th style="text-align: center;">Nombre de jours</th>
            <th style="text-align: center;">Duree</th>
            <th style="text-align: center;">Nombre de jours restant</th>
            <th style="text-align: center;">Action</th>


          </tr>
        </thead>
        <tbody>
          <?php
          require('./../../core/Database/connection.php');
          $conn = (new Database())->getConnection();

          $sql = "SElECT conges.id_leave, conges.leave_start_date, conges.annee, conges.leave_days, conges.used_days, conges.statut, conges.leave_duration, conges.id_employee,
          employes.name FROM conges LEFT JOIN employes ON conges.id_employee=employes.id_employee WHERE conges.disable = :disable AND conges.annee = :annee";

          $query = $conn->prepare($sql);
          $query->bindValue(':disable', 1, \PDO::PARAM_INT);
          $query->bindValue(':annee', date('Y'), \PDO::PARAM_INT);
          $query->execute();
          $qemploye = $conn->query('SELECT * FROM employes');

          foreach ($query as $conge) {
            $qemploye1 = $conn->query('SELECT * FROM employes');
          ?>
            <tr>
              <td><?= $conge['id_leave'] ?></td>
              <td style="text-align: center;"><?= $conge['name'] ?></td>
              <td><?= $conge['leave_start_date'] ?></td>
              <td style="text-align: center;"><?= $conge['leave_days'] ?></td>
              <td style="text-align: center;"><?= $conge['leave_duration'] ?></td>
              <td style="text-align: center;"><?= $diff = $conge['leave_days'] - ($conge['used_days']) - $conge['leave_duration']; ?></td>

              <td width=160>
                <a class="btn btn-light" href="view.php?id=<?= $conge['id_leave'] ?>"><i class="fas fa-eye"></i> </a>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $conge['id_leave'] ?>"><i class="fas fa-trash"></i></button>
                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModale<?= $conge['id_leave'] ?>"><i class="fas fa-edit"></i></button>


                <!-- supprimer -->

                <div class="modal fade" id="exampleModal<?= $conge['id_leave'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Gestion conges</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        Voulez vous vraiment supprimer?
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Non</button>
                        <a class="btn btn-danger" href="delete.php?id=<?= $conge['id_leave'] ?>">Oui</a>

                      </div>
                    </div>
                  </div>
                </div>


                <!-- modifier -->
                <div class="modal fade" id="exampleModale<?php echo $conge['id_leave'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Gestion conges</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <h1> MODIFIER UN CONGE</h1><br>
                        <div class="row">
                          <div class="col-md-12 m-auto">
                            <form class="form" action="update.php?id=<?php echo $conge['id_leave'] ?>" role="form" method="post" enctype="multipart/form-data">
                              <div class="form-group">
                                <label for="name" hidden=""><strong>Nom de l'employe</strong></label>
                                <input disabled type="text" class="form-control" value="<?= $conge['name'] ?>" id="" name="name" placeholder="" disabled>
                              </div><br>
                              <div class="form-group">
                                <label for="leave_start_date"><strong>Date debut conge</strong></label>
                                <input type="date" class="form-control" value="<?= $conge['leave_start_date'] ?>" id="" name="leave_start_date" placeholder="" required>
                              </div><br>
                              <div class="form-group">
                                <label for="leave_duration"><strong>Duree du conge</strong></label>
                                <input type="number" class="form-control" id="" value="<?= $conge['leave_duration'] ?>" name="leave_duration" placeholder="" required>
                              </div><br>

                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" name="send" class="btn btn-success" href="update.php?id=<?php $conge['id_leave'] ?>">Modifier</button>
                          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Non</button>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>
                <?php
              }
                ?>
        </tbody>

      </table>
    </div>

    <!-- ajouter -->
    <div class="modal fade" id="exampleModala" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ajouter un conge</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div><br>
          <div class="modal-body">
            <form action="add.php" method="post">
              <div class="form-group">
                <label for="name"><strong>Nom de l\'employe</strong></label>
                <select class="form-control" name="name" id="">
                  <option value="" disabled>selectioner un employe</option>
                  <?php while ($info = $qemploye->fetch()) {

                  ?> <option value="<?=
                                    $info['id_employee']; ?>"><?=
                                                              $info['name']; ?></option><?php } ?>
                </select>
              </div><br>

              <div class="form-group">
                <label for="leave_start_date"><strong>Date debut conge</strong></label>
                <input type="date" class="form-control" id="leave_start_date" name="leave_start_date" placeholder="" required>
              </div><br>
              <div class="form-group">
                <label for="leave_duration"><strong>Duree du conge</strong></label>
                <input type="number" class="form-control" id="leave_duration" name="leave_duration" placeholder="" required>
              </div><br>
          </div>
          <div class="modal-footer">

            <button type="submit" name="send" class="btn btn-success">Ajouter</button>
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">retour</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $("#leave").dataTable({});
</script>
<?php

require('./../view/includes/footer.php');
?>