<?php 
require('./../view/includes/header.php');
$_SESSION['title'] = "Inseré un type de contrat";


require('./../../core/Database/connection.php');
$conn = (new Database())->getConnection();


if (isset($_POST['ajouter'])) {
  $contract_type_name = $_POST['nom_type_contrat'];
  $description = $_POST['description'];
  $creation_date = $_POST['creation_date'];
  $modification_date = $_POST['modification_date'];

  $q = $conn->prepare(' INSERT INTO `type_contrats`(`contract_type_name`, `description`,`creation_date` , `modification_date`) VALUES (?,?,NOW(),?)');
  $q->execute(array($contract_type_name, $description, $modification_date));

  header("location:IndexTypes.php");
}


?>


<div class="">
  <form action="insert.php" method="post">


    <div class="row">
      <div class="container col-lg-offset-3 col-lg-6">
        <div class="section">
          <h1> AJOUTER UN TYPE DE CONTRAT</h1><br><br>
          <div class="mb-6">
            <label for="nom_type_contrat" class="form-label">
              <h5>Nom du type de contrat</h5>
            </label>
            <input type="text" class="form-control" id="nom_type_contrat" placeholder="name" name="nom_type_contrat" required>
          </div>
          <div class="mb-3">
            <label for="description" class="form-label">
              <h5>Description</h5>
            </label>
            <textarea type="text" class="form-control" id="description" placeholder="description" name="description" required></textarea>
          </div>
        </div>
        <button type="submit" class="btn btn-success" name="ajouter">Ajouter</button>
        <a href="IndexTypes.php" class="btn btn-primary">retour</a>
      </div>
    </div>
  </form>
</div>

</div>
<?php  require('./../view/includes/footer.php'); ?>