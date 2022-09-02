<?php   require('./../view/includes/header.php');
$_SESSION['title']="Ajout d'un employés";
require('./../../core/Database/connection.php');
$conn = (new Database())->getConnection();
// $sql= "SELECT * FROM roles"

if(isset($_POST['ajouter'])){
    $nom=htmlspecialchars($_POST['nom']);
    $prenom=htmlspecialchars($_POST['prenom']);
    $age=htmlspecialchars($_POST['age']);
    $sex=htmlspecialchars($_POST['sex']);
    $statut=htmlspecialchars($_POST['statut']);
    $role=htmlspecialchars($_POST['role']);
    $email=htmlspecialchars($_POST['email']);
    $pass=htmlspecialchars($_POST['pass']);
    $date=htmlspecialchars($_POST['date']);
    $fonction=htmlspecialchars($_POST['fonction']);
    $login=htmlspecialchars($_POST['login']);
    $photo=htmlspecialchars($_POST['photo']);
    $conn = (new Database())->getConnection();
    // $sql= $conn->query("SELECT `Id_role` FROM `roles` WHERE name=$role");
    // $info = $sql->fetch();
    $q = $conn->prepare('INSERT INTO employes (name, surname, age, sex, marital_status, id_role, mail, password, begin_date, desactivate, login, photo) VALUES (?,?,?,?,?,?,?,?,NOW(),?,?,?)');
    $q->execute(array($nom,$prenom,$age, $sex, $statut,$role,$email, $pass, $fonction, $login, $photo));
    $conn = (new Database())->getConnection();
    $_SESSION['erreur'] = "<center>Ajout reussi !!!</center>"; 

    header("Location: IndexEmployes.php");

    }
  ?>
 <link rel="stylesheet" href="./style.css">
    <div class="container admin">
        <form class="form" role="form"  method="post">
            <h2>Ajout d'un employe</h2>
            <div class="row">
                <div class="col-md-6 ">
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="name" name="nom"   required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Prenom</label>
                        <input type="text" class="form-control" id="prenom" name="prenom" required >
                        
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Age</label>
                        <input type="number" class="form-control"  id="age" name="age" required>
                       
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Sex</label>
                        <select class="form-select form-select-lg mb-3" aria-label="form-select-lg example" id="sex" name ="sex">
                        <option value="Homme">Homme</option>
                        <option value="Femme">Femme</option>
                        </select>
                        
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Statut</label>
                        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" id="statut" name="statut">
                        <option value="Marié">Marié</option>
                        <option value="Divorcé">Divorcé</option>
                        <option value="celibataire">celibataire</option>
                        </select>
                        
                    </div>
                    <div class="mb-3" hidden>
                        <label for="exampleInputPassword1" class="form-label">En fonction</label>
                        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" id="foncton" name="fonction" >
                        <option value="1">1</option>
                        <option value="0">0</option>
                        </select>
                     </div>
                   
                </div>
                <div class="col-md-6">
                <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Login</label>
                        <input type="text" class="form-control"  id="Login" name="login" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email </label>
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" required>
                        
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Mots de passe</label>
                        <input type="password" class="form-control" id="pass" name ="pass" required>
                        
                    </div>
                    <div class="mb-3" hidden>
                        <label for="exampleInputPassword1" class="form-label">date de debut</label>
                        <input type="date" class="form-control" id="date" name="date" >
                        
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Role</label>
                        <select class="form-control" id ="role" name = "role" required>
                        <option selected>Choisir un role</option>
                        <?php
                            $conn = (new Database())->getConnection();
                            foreach($conn->query('SELECT*FROM roles') as $row ){
                                echo '<option value ="'.$row['Id_role']. '">'. $row['name'].'</option>';
                            }
                        ?>
                        </select>
                        
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Photo</label>
                        <input type="file" class="form-control" id="photo" name ="photo" required>
                        
                    </div>
                    
                    <br><br>
                    <div class="form-action mb-3">
                        <button type="submit" class="btn btn-outline-success" name ="ajouter">Ajouter</button>
                        <a href="IndexEmployes.php" class="btn btn-outline-primary" >Revenir </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
<?php require('./../view/includes/footer.php');?>