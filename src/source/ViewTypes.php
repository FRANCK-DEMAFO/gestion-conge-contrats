<?php
require('./../view/includes/header.php');
$_SESSION['title'] = "Detail sur un type de contrat";

?>

<div class="container  col-lg-6">
    <div class="row">
        <div class="col-sm-12 m-auto">
            <h1><strong>Détails sur le type de contrat</strong></h1>
            <br>
            <table class="table table-warning table-striped table-bordered border-dark" >
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>nom type contrat</th>
                        <th>description</th>
                        <th> date de creation</th>
                        <th> date de modification</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require('./../../core/Database/connection.php');
                    
                    $conn = (new Database())->getConnection();
                    $q = $conn->prepare("SElECT * FROM type_contrats WHERE id_contract_type=:id_contract_type");
                    $q->execute([
                        'id_contract_type' => $_GET['id']
                    ]);
                    $type_contrat = $q->fetchall(PDO::FETCH_ASSOC);

                    ?>
                    <tr>
                        <td><?= $type_contrat[0]['id_contract_type'] ?></td>
                        <td><?= $type_contrat[0]['contract_type_name'] ?></td>
                        <td><?= $type_contrat[0]['description'] ?></td>
                        <td><?= $type_contrat[0]['creation_date'] ?></td>
                        <td><?= $type_contrat[0]['modification_date'] ?></td>
                    </tr>


                </tbody>
            </table>
            <div class="form-actions">
                        <a href="IndexTypes.php" class="btn btn-primary">Retour </a>

                    </div>
        </div>


    </div>
</div>

</body>

</html>
<?php
require('./../view/includes/footer.php');
?>