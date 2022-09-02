<?php 
  require('./../view/includes/header.php');
$_SESSION['title'] = "Modification d'un type de contrat";

  require('./../../core/Database/connection.php');
   if (isset($_GET['id'])){
    $conn = (new Database())->getConnection();
   $id=$_GET['id']; 
                            
   $q = $conn->prepare("SELECT * FROM `type_contrats` WHERE id_contract_type=?");
     $q->execute(array($id));
   $type_contrats= $q->fetch(PDO::FETCH_ASSOC) ;  
}
    if (isset($_POST['effectuer'])){
        $contract_type_name = $_POST['contract_type_name'];
        $description =$_POST['description'];
      
        $q = $conn->prepare(" UPDATE `type_contrats` SET `contract_type_name`=?, `description`=?,`modification_date`=NOW() WHERE `id_contract_type`=?");
        $q->execute(array($contract_type_name,$description,$id)); 
        $_SESSION['erreur']='MODIFICATION DU TYPE DE CONTRAT REUSSIE AVEC SUCCES'; 
          
        header('Location:IndexTypes.php');
        
      }
 


?>


    <section class="container col-lg-offset-3 col-lg-6">
        <h1> modifier un contrat</h1>
        <div class="row">
            <div class="col-md-12 m-auto">           
                <div class="section">
                
                    <form class="form" role="form" method="post">
                    <div class="mb-6">
                        <label for="exampleFormControlInput1" class="form-label"><h5>nom type contrat</h5></label>
                        <input type="name" class="form-control" value="<?= $type_contrats['contract_type_name'] ?>" id="contract_type_name"
                        name="contract_type_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label"><h5>description</h5></label>
                        <input type="text" class="form-control" value="<?= $type_contrats['description'] ?>" id="description" placeholder="description"
                        name="description" required>
                    </div>
                        <h1><strong> <a href="IndexTypes.php" class="btn btn-primary">retour</a>
                        <button type="submit" class="btn btn-success" name="effectuer">Modifier</button>  
                    </form>
                </div> 
            </div>
        </div>
    </section>
    <?php require('./../view/includes/footer.php'); ?>
</body>
</html>