<?php 
require('./../view/includes/header.php');
$_SESSION['title'] = "Detail sur un contrat";


if (!empty($_GET['id_contract'])) {
  $id_contract = checkInput($_GET['id_contract']);
}
require('./../../core/Database/connection.php');
$conn = (new Database())->getConnection();;
$q = $conn->prepare("SELECT * FROM contrats WHERE id_contract=:id_contract ");
$q->execute([
  'id_contract' => $_GET['id']
]);
$contrats = $q->fetch(PDO::FETCH_ASSOC);
function checkInput($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}



?>

<div class="container ">
  <div class="row">
    <div class="col-lg-6 m-auto">
      <form>
        <h1>Details Sur Le Contrat</h1>

        <div class="form_group">
          <label>id:</label><?= $contrats['id_contract']; ?> </br> </br>
        </div>
        <div class="form_group">
          <label>start_date:</label><?= $contrats['start_date']; ?> </br> </br>
        </div>
        <div class="form_group">
          <label>creation_date:</label><?= $contrats['creation_date']; ?> </br> </br>
        </div>
        <div class="form_group">
          <label>modification_date:</label><?= $contrats['modification_date']; ?> </br> </br>
        </div>
        <div class="form_group">
          <label>description:</label><?= $contrats['description']; ?> </br> </br>
        </div>
        <div class="form_group">
          <label>statut:</label> <?= $contrats['statut']; ?> </br> </br>
        </div>
        <strong> <a href="IndexContrat.php" class="btn btn-primary">retour</a>

    </div>
  </div>
  </form>
</div>
</div>
</div>
<?php require('./../view/includes/footer.php'); ?>