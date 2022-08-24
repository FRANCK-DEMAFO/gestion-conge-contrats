<?php   require('./../view/includes/header.php');
$_SESSION['title']="Detail sur un employé";
require('./../../core/Database/connection.php');
    if(!empty($_GET['id_employee'])){
        $id_employee=checkInput($_GET['id_employee']);
    }

    $conn = (new Database())->getConnection();
    $q = $conn->prepare("SElECT employes.id_employee, employes.name, employes.surname, employes.marital_status, roles.name AS id_role  , 
    employes.begin_date, employes.desactivate, employes.photo FROM employes LEFT JOIN roles ON employes.id_role =roles.id_role WHERE id_employee=:id_employee ");
    $q->execute([
        'id_employee'=> $_GET['id']
    ]);
    $employes = $q->fetch(PDO::FETCH_ASSOC);

    function checkInput($data){
        $data=trim($data);
        $data=stripslashes($data);
        $data=htmlspecialchars($data);
        return $data;
    }

  ?>
 <link rel="stylesheet" href="./style.css">
    <div class="container admin">
        <div class="row">
            <div class="col-sm-6 site">
                <h1><strong>Détails sur l'employé <?=' '.$employes['name'].' '.   $employes['surname']; ?></strong></h1>
                <br>
                <form>
                    <div class="form-groupe">
                        <label>Nom:</label><?=' '.$employes['name']; ?>
                    </div>
                    <br>
                    <div class="form-groupe">
                        <label>Prenom:</label><?=' '.$employes['surname']; ?>
                    </div>
                    <br>
                    <div class="form-groupe">
                        <label>Status:</label><?=' '.$employes['marital_status']; ?>
                    </div>
                    <br>
                    <div class="form-groupe">
                        <label>role:</label><?=' '.$employes['id_role']; ?>
                    </div>
                    <br>
                    <div class="form-groupe">
                        <label>Date debut:</label><?=' '.$employes['begin_date']; ?>
                    </div>
                </form>
                <br>
                <div class="form-actions">
                    <a href="IndexEmployes.php" class="btn btn-primary"> <i class="fas fa-arrow-left"></i> Retour </a>

                </div>
            </div>
            <div class="col-sm-6">
                <div class="thumbnail">
                    <img src= "<?= './../../assets/images/'. $employes['photo'] ; ?>" width =80% height=80% >

                </div>
            </div>
        </div>
    </div>
<?php require('./../view/includes/footer.php');?>