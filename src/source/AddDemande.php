<?php 
 require('./../view/includes/header.php');
$_SESSION['title'] = "Ajouter une demande"; 
require_once('./../../core/Database/connection.php');
$conn = (new Database())->getConnection();
$motif = $cdate = $bdate = $edate = "";
if (isset($_POST['creer'])) {
    $motif = htmlspecialchars($_POST['motif']);
    $cdate = htmlspecialchars($_POST['cdate']);
    $bdate = htmlspecialchars($_POST['bdate']);
    $edate = htmlspecialchars($_POST['edate']);
    $name = htmlspecialchars($_POST['name']);
    if (!empty($motif) && !empty($bdate) && !empty($edate)) {
        $q = $conn->prepare('INSERT INTO `demande_permissions`( `reason`, `creation_date`, `depart_date`, `ending_date`, `id_employee`) VALUES (?,NOW(),?,?,?)');
        $q->execute(array($motif, $bdate, $edate, $name));
    }



    header('Location:IndexDemande.php');
}
?>


<main class="container">
    <div class="row">
        <div class="col-md-6 m-auto">
            <h1>Creer des demandes</h1>
            <form method="post">

                <div class="form-group">
                    <label for="name" class="form-label">
                        <h4>Nom</h4>
                    </label>
                    <select class="form-control" id="name" name="name" required>
                        <option selected></option>
                        <?php
                        $conn = (new Database())->getConnection();
                        foreach ($conn->query('SELECT * FROM employes') as $row) {
                            echo '<option value = " ' . $row['id_employee'] . ' ">' . $row['name'] . '</option>';
                        }
                        ?>
                    </select>

                </div> <br />
                <div class="form-group">
                    <label for="motif">
                        <h4>Motif</h4>
                    </label>
                    <textarea id="motif" name="motif" class="form-control"></textarea>
                </div> <br />

                <div class="form-group">
                    <label for="nom">
                        <h4>Date de depart</h4>
                    </label>
                    <input type="date" id="Bdate" name="bdate" class="form-control">
                </div> <br />
                <div class="form-group">
                    <label for="Cdate">
                        <h4>Date de retour</h4>
                    </label>
                    <input type="date" id="Edate" name="edate" class="form-control">
                </div> <br />

                <button class="btn btn-primary" type="submit" name="creer">
                    <h4>Creer</h4>
                </button>
            </form>
        </div>
    </div>
</main>
<?php require('./../view/includes/footer.php'); ?>