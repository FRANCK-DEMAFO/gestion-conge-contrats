<?php 
 require('./../view/includes/header.php');
$_SESSION['title'] = "Modification d'un model de contrat";
  ?>

<?php
if (isset($_GET['id'])) {

  require_once('./../../core/Database/connection.php');
  $conn = (new Database())->getConnection();
  $q = $conn->prepare("SELECT models_contrats.id_model,type_contrats.contract_type_name AS id_contract_type , models_contrats.model_name, models_contrats.model, models_contrats.date_creation 
      FROM models_contrats LEFT JOIN type_contrats ON models_contrats.id_type_contrat=type_contrats.id_contract_type  WHERE id_model=:id ");
  $q->bindValue(':id', $_GET['id']);
  $q->execute();
  $result = $q->fetchAll();


  if (isset($_POST['Modifier'])) {
    $id_type_contrat = htmlspecialchars($_POST['id_type_contrat']);
    $name = htmlspecialchars($_POST['name']);
    $model = html_entity_decode($_POST['model']);
    if (!empty($id_type_contrat) && !empty($name) && !empty($model)) {
      $id = $_GET['id'];
      $q = $conn->prepare("UPDATE `models_contrats` SET `id_type_contrat`=?,`model_name`=?,`model`=?,`date_creation`= NOW() WHERE id_model=?");
      $q->execute(array($id_type_contrat, $name, $model, $id));
      header('Location:IndexModel.php');
    }
  }
}
?>


<div class="col-lg-6 m-auto">
<h1 class="titre" style="color:black;text-align: center;margin-top: 50px;"><strong>Models de Contrats</strong></h1>
<main class="container">
  <div class="row">
    <section class="col-12">

      <h1>Modifier un Model</h1><br>
      <form method="post">
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label" name="id_type_contrat"> <strong> Nom du Type de Contrat :</strong></label>

          <select type="text" class="form-control" id="id_type_contrat" name="id_type_contrat" required>
            <option selected></option>
            <?php
            $conn = (new Database())->getConnection();

            foreach ($conn->query('SELECT * FROM type_contrats') as $row) {
              echo '<option value = " ' . $row['id_contract_type'] . ' ">' . $row['contract_type_name'] . '</option>';
            }
            ?>
          </select>
        </div>

        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label"> <strong> Nom du Model de Contrat :</strong></label>
          <input type="text" class="form-control" value="<?= $result[0]['model_name']; ?>" id="exampleFormControlInput1" name="name">
        </div>

        <div class="mb-6"><br>
          <label for="mytextarea" class="form-label"> <strong> Contenu du Model de Contrat :</strong></label>
          <textarea id="mytextarea" type="text" name="model">
                              <?= $result[0]['model']; ?>
                            </textarea>
        </div><br>

        <button type="submit" name="Modifier" class="btn btn-success">Modifier</button>
        <a href="IndexModel.php" class="btn btn-primary">retour</a>

      </form>
    </section>
  </div>
</main>
</div>

<?php require('./../view/includes/footer.php'); ?>