<?php require('./../view/includes/header.php');
$_SESSION['title'] = "Modifié un employé";
require('./../../core/Database/connection.php');
$conn = (new Database())->getConnection();
if (isset($_GET['id'])) {
    $conn = (new Database())->getConnection();
    $id = $_GET['id'];
    $q = $conn->prepare("SELECT * FROM `employes` WHERE id_employee=?");
    $q->execute([$_GET['id']]);
    $employes = $q->fetch(PDO::FETCH_ASSOC);
}
if (isset($_POST['modifier'])) {
    $nom = ($_POST['nom']);
    $prenom = ($_POST['prenom']);
    $age = ($_POST['age']);
    $sex = ($_POST['sex']);
    $statut = ($_POST['statut']);
    $role = ($_POST['role']);
    $email = ($_POST['email']);
    $pass = ($_POST['pass']);
    $date = ($_POST['date']);
    $fonction = ($_POST['fonction']);
    $login = ($_POST['login']);
    $photo = ($_POST['photo']);

    $q = $conn->prepare("UPDATE `employes` SET `name`=?, `surname`=?, `age`=?, `sex`=?, `marital_status`=?, `id_role`=?, `mail`=?, `password`=?, `begin_date`=?, `desactivate`=?, `login`=?, `photo`=? WHERE id_employee=?");
    $q->execute(array($nom, $prenom, $age, $sex, $statut, $role, $email, $pass, $date, $fonction, $login, $photo, $id));
    $_SESSION['erreur'] = "Employé modifier avec succes";
    header("Location: IndexEmployes.php");
}



 ?>
<link rel="stylesheet" href="./style.css">
<div class="container admin">
    <form class="form" role="form" method="post">
        <h2>Modifier un employe</h2>
        <div class="row">
            <div class="col-md-6 ">
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="name" value="<?= html_entity_decode($employes['name']); ?>" name="nom" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Prenom</label>
                    <input type="text" class="form-control" id="prenom" value="<?= html_entity_decode($employes['surname']); ?>" name="prenom" required>

                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Age</label>
                    <input type="number" class="form-control" id="age" value="<?= $employes['age']; ?>" name="age" required>

                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Sex</label>
                    <select class="form-select form-select-lg mb-3" aria-label="form-select-lg example" id="sex" name="sex">
                        <option value="Homme">Homme</option>
                        <option value="Femme">Femme</option>
                    </select>

                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Statut</label>
                    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" id="statut" name="statut">
                        <option value="Marié">Marié</option>
                        <option value="Divorcé">Divorcé</option>
                        <option value="celibataire">celibataire</option>-
                    </select>

                </div>
                <div class="mb-3" hidden>
                    <label for="exampleInputPassword1" class="form-label">En fonction</label>
                    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" id="foncton" value="<?= $employes['desactivate']; ?>" name="fonction">
                        <option value="1">1</option>
                        <option value="0">0</option>
                    </select>
                </div>

            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Login</label>
                    <input type="text" class="form-control" id="Login" value="<?= $employes['login']; ?>" name="login" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email </label>
                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" value="<?= $employes['mail']; ?>" name="email" required>

                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Mots de passe</label>
                    <input type="password" class="form-control" id="pass" value="<?= $employes['password']; ?>" name="pass" required>

                </div>
                <div class="mb-3" hidden>
                    <label for="exampleInputPassword1" class="form-label">date de debut</label>
                    <input type="date" class="form-control" id="date" value="<?= $employes['begin_date']; ?>" name="date" required>

                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Role</label>
                    <select class="form-control" id="role" name="role" required>
                        <option selected></option>
                        <?php
                        $conn = (new Database())->getConnection();
                        foreach ($conn->query('SELECT*FROM roles') as $row) {
                            echo '<option value ="' . $row['Id_role'] . '">' . $row['name'] . '</option>';
                        }
                        
                        ?>
                    </select>

                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Photo</label>
                    <input type="file" class="form-control" id="photo" name="photo">

                </div>

                <br><br>
                <div class="form-action mb-3">
                    <button type="submit" class="btn btn-outline-success" name="modifier">modifier</button>
                    <a href="indexEmployes.php" class="btn btn-outline-primary">Revenir </a>
                </div>
            </div>
        </div>
    </form>
</div>
<?php require('./../view/includes/footer.php'); ?>