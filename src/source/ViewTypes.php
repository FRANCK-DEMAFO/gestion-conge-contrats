<?php
require('./../view/includes/header.php');
$_SESSION['title'] = "Detail sur un type de contrat";


require('./../../core/Database/connection.php');
$conn = (new Database())->getConnection();
if (!empty($_GET['id_contract_type'])) {
    $id_contract_type = checkInput($_GET['id_contract_type']);
}
$q = $conn->prepare("SElECT * FROM type_contrats WHERE id_contract_type=:id_contract_type ");
$q->execute([
    'id_contract_type' => $_GET['id']
]);
$type_contrats = $q->fetch(PDO::FETCH_ASSOC);
function checkInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>

<div class="container admin">
    <div class="row">
        <div class="col-lg-6 m-auto">
            <h1><strong>Détails sur le type de contrat</strong></h1>
            <br>
            <table class="table table-striped table-bordered">
                <thead>

                    <form>
                        <div class="form-groupe">
                            <label><strong>nom type contrat :</strong></label><?= $type_contrats['contract_type_name']; ?>
                        </div>
                        <br>
                        <div class="form-groupe">
                            <label><strong>description :</strong></label><?= $type_contrats['description']; ?>
                        </div>
                        <br>
                        <div class="form-groupe">
                            <label><strong>date de creation :</strong></label><?= $type_contrats['creation_date']; ?>
                        </div>
                        <br>
                        <div class="form-groupe">
                            <label><strong>date de modification :</strong></label><?= $type_contrats['modification_date']; ?>

                        </div><br><br>

                        <a href="IndexTypes.php" class="btn btn-primary">retour</a>


                    </form>
            </table>

        </div>


    </div>
</div>

</body>

</html>
<?php
require('./../view/includes/footer.php');
?>