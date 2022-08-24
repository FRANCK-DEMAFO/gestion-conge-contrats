<?php 
require('./../view/includes/header.php') ;
$_SESSION['title'] = "detail sur un congés";


require('./../../core/Database/connection.php');
if (!empty($_GET['id_leave'])) {
    $id_conges = checkInput($_GET['id_leave']);
}
$conn = (new Database())->getConnection();
$q = $conn->prepare("SElECT conges.id_leave, conges.leave_start_date, conges.statut, conges.leave_duration,
    employes.name FROM conges LEFT JOIN employes ON conges.id_employee=employes.id_employee WHERE id_leave=:id_leave");


$q->execute([
    'id_leave' => $_GET['id']
]);
$conges = $q->fetch(PDO::FETCH_ASSOC);

function checkInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>

<body>
    <section class="container col-lg-offset-3 col-lg-6">
        <div class="container admin">
            <div class="row">
                <div class="col-lg-6 m-auto">
                    <h1><strong>Détails sur le conge</strong></h1>
                    <br>
                    <form>
                        <div class="form-groupe">
                            <label><strong>Nom:</strong></label><?php echo ' ' . $conges['name']; ?>
                        </div><br>
                        <div class="form-groupe">
                       
                            <label><strong>Date de debut:</strong></label><?php echo ' ' . $conges['leave_start_date']; ?>
                        </div>
                        <br>
                        <div class="form-groupe">
                            <label><strong>Duree du conge:</strong></label><?php echo ' ' . $conges['leave_duration']; ?>
                        </div>
                        <br>
                        <div class="form-groupe">
                            <label><strong>Statut:</strong></label><?php echo ' ' . $conges['statut']; ?>
                        </div>
                        <br>
                        <div class="form-actions">
                            <a href="index.php" class="btn btn-primary">Retour </a>

                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
</body>

</html>
<?php require('./../view/includes/footer.php') ?>