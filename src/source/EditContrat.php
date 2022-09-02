<?php
require('./../view/includes/header.php');
$_SESSION['title'] = "Modifier un contrat";


if (isset($_GET['id'])) {


  require('./../../core/Database/connection.php');
  $conn = (new Database())->getConnection();


  $q = $conn->prepare("SELECT * FROM contrats WHERE id_contract = :id");
  $q->execute([
    'id' => $_GET['id']
  ]);
  $result = $q->fetch(PDO::FETCH_OBJ);
}



$id = $_GET['id'];
if (isset($_POST['submit'])) {
  $creation_date = ($_POST['creation_date']);
  $start_date = ($_POST['start_date']);
  $description = ($_POST['description']);
  $modification_date = ($_POST['modification_date']);
  $end_date = ($_POST['end_date']);
  $statut = ($_POST['statut']);

  $q = $statement->prepare("update  `contrats` set creation_date=?,
    start_date=?, description=?, modification_date=?,
    end_date=?, statut=? where id_contract=? ");

  $q->execute(array($creation_date, $start_date, $description, $modification_date, $end_date, $statut, $id));
  $result = $q->fetch(PDO::FETCH_OBJ);

  header("Location: index.php");
}


?>




<section class="container col-lg-offset-3 col-lg-6">
  <h1> Modifier un contrat</h1>
  <div class="row">

    <div class="col-md-12 m-auto">
      <div class="section">
        <form action="#" method="post" name="update">
          <div class="font1">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">
                <h5>date de debut</h5>
              </label>
              <input type="date" class="form-control" name="start_date" value="<?= $result->start_date ?>" id="exampleFormControlInput1" placeholder="jj/mm/aaaa">
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">
                <h5>date de fin</h5>
              </label>
              <input type="date" class="form-control" name="end_date" value="<?= $result->end_date ?>" id="end_date" placeholder="jj/mm/aaaa">
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">
                <h5>description</h5>
              </label>
              <textarea type="text" class="form-control" name="description" id="description" placeholder=""><?= $result->description ?></textarea>
            </div>

            <label for="exampleInputPassword1" class="form-label">
              <h5>statut</h5>
            </label>
            <select class="form-select form-select-lg mb-3" aria-label="form-select-lg example" id="statut" name="statut">
              <option value="actif">actif</option>
              <option value="resilier">resilier</option>
            </select>
          </div>
          <h1><strong> <a href="./IndexContrat.php" class="btn btn-primary btn-lg ">
                <img src="./../../../assets/bootstrap-icons/arrow-down-left.svg">retour</a>
              <button type="submit" name="submit" class="btn btn-success">
                <h4>Modifier</h4>
              </button> </h1>
      </div>
    </div>
    </form>
  </div>
</section>
<?php require('./../includes/footer.php'); ?>