<?php 
require('./../view/includes/header.php');
$_SESSION['title'] = "Detail sur un contrat";

?>

<div class="container">
  <div class="row">
    <div class="col-sm-12 site">
      <h1><strong>Détails sur le contrat</strong></h1>
      <br>
      <table class="table table-striped table-bordered border-dark">

        <thead>
          <tr class="table-like">
            <th scope="col">id</th>
            <th scope="col">Nom de l'employe</th>
            <th scope="col">Nom du type de contrat</th>
            <th scope="col">date de creation</th>
            <th scope="col">date de debut</th>
            <th scope="col">date de fin</th>
            <th scope="col">description</th>
            <th scope="col">date de modification</th>
            <th scope="col"> statut</th>

          </tr>
        </thead>
        <tbody>
  <?php
         require('./../../core/Database/connection.php');
         $conn = (new Database())->getConnection();
          $q = $conn->prepare("SELECT contrats.id_contract, contrats.start_date, contrats.creation_date,
                    contrats.end_date,contrats.description, contrats.modification_date, contrats.statut, contrats.deleted,type_contrats.contract_type_name AS 
                    id_contract_type, employes.name AS id_employee FROM contrats LEFT JOIN type_contrats ON contrats.id_contract_type=type_contrats.id_contract_type LEFT JOIN employes ON
                    contrats.id_employee = employes.id_employee WHERE id_contract=:id_contract ");
          $q->execute([
            'id_contract' => $_GET['id']
          ]);
          $contrats = $q->fetch(PDO::FETCH_ASSOC);

          ?>
          <tr class="table table-striped table-bordered " style="border-color:black;">

            <td> <?= $contrats['id_contract'] ?> </td>
            <td> <?= $contrats['id_employee'] ?></td>
            <td> <?= $contrats['id_contract_type'] ?></td>
            <td> <?= $contrats['creation_date'] ?></td>
            <td> <?= $contrats['start_date'] ?></td>
            <td> <?= $contrats['end_date'] ?></td>
            <td> <?= $contrats['description'] ?> </td>
            <td> <?= $contrats['modification_date'] ?> </td>
            <td> <?= $contrats['statut'] ?></td>
          </tr>


        </tbody>
      </table>

    </div>


  </div>
</div>

<a href="./indexcontrat.php" class="btn btn-success btn-lg a1">
  <img src="./../../vendor/bootstrap-icons/arrow-down-left.svg">retour</a>


</body>

</html>
<?php
require('./../view/includes/footer.php');
?>