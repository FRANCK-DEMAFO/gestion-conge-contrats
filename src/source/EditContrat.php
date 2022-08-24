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
  $start_date = ($_POST['start_date']);
  $description = ($_POST['description']);
  $modification_date = ($_POST['modification_date']);
  $end_date = ($_POST['end_date']);
  $statut = ($_POST['statut']);

  $q = $conn->prepare("update  `contrats` set
    start_date=?, description=?, modification_date=?,
    end_date=?, statut=? where id_contract=? ");

  $q->execute(array($start_date, $description, $modification_date, $end_date, $statut, $id));
  $result = $q->fetch(PDO::FETCH_OBJ);

  header("Location: index.php");
}





?>


<section class="container col-lg-offset-3 col-lg-6">
  <h1> modifier un contrat</h1>
  <div class="row">

    <div class="col-md-12 m-auto">
      <div class="section">
        <form action="#" method="post" name="update">
          <div class="font1">

            
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">
                <h5>start_date</h5>
              </label>
              <input type="date" class="form-control" name="start_date" value="<?= $result->start_date ?>" id="exampleFormControlInput1" placeholder="jj/mm/aaaa">
            </div>
            <div class="mb-6">
              <label for="exampleFormControlInput1" class="form-label">
                <h5>modification_date</h5>
              </label>
              <input type="date" class="form-control" name="modification_date" value="<?= $result->modification_date ?>" id="exampleFormControlInput1" placeholder="jj/mm/aaaa">
            </div>
            <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label">  <h5>statut</h5></label>
              <input type="text"class="form-control" name="statut" value="<?= $result->statut ?>"id="statut" rows="3">
            </div>
          </div>
          <h1><strong> <a href="IndexContrat.php" class="btn btn-primary">retour</a>
              <button type="submit" name="submit" class="btn btn-success">Modifier</button>
      </div>
    </div>
    </form>
  </div>
</section>
<?php require('./../view/includes/footer.php'); ?>
