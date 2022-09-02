<?php 
require('./../view/includes/header.php');
$_SESSION['title'] = "Modification d'une demande de permission"; 
 ?>

 
 <?php
if(isset($_GET['id'])){
  
  require_once('./../../core/Database/connection.php');
  $conn = (new Database())->getConnection();
$q = $conn->prepare("SElECT demande_permissions.id_request, demande_permissions.reason, demande_permissions.creation_date, demande_permissions.depart_date,
demande_permissions.ending_date,demande_permissions.deleted,employes.name FROM `demande_permissions` LEFT JOIN employes
 ON demande_permissions.id_employee=employes.id_employee WHERE id_request=:id ");
$q->bindValue(':id',$_GET['id']);
$q->execute();
 $result = $q->fetchAll();
  

if(isset($_POST['Modifier'])){
  $motif = htmlspecialchars ($_POST['motif']);
  $bdate = htmlspecialchars($_POST['bdate']);
  $edate = htmlspecialchars ($_POST['edate']);
  if(!empty($motif) && !empty($bdate) && !empty($edate) ){
  $id = $_GET['id'];
  $q = $conn->prepare("UPDATE `demande_permissions` SET `reason`=?,`creation_date`=NOW(),`depart_date`=?,`ending_date`=? WHERE id_request=?");
  $q->execute(array($motif,$bdate,$edate,$id));

  $_SESSION['success'] = "<center>Demande modifiée avec success!</center>";
  header('Location:IndexDemande.php'); 
}
}

}
?> 

    <main class="container">
        <div class="row">
            <div class="col-md-6 m-auto">
           
                <h1>Modifier une demande</h1>
                    <form method="post">
                    <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label"><h4>Nom</h4></label>
                      <input type="text" class="form-control" disabled value=<?php echo $result[0]['name']; ?> id="exampleFormControlInput1" name="name" >
                    </div>
                    <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label"><h4>Motif</h4></label>
                      <textarea class="form-control"  id="exampleFormControlInput1" name="motif"><?php echo $result[0]['reason']; ?></textarea>
                    </div>
                    
                    <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label"><h4>Date de depart</h4></label>
                      <input type="date" class="form-control" value=<?php echo $result[0]['depart_date']; ?> id="start" name="bdate">
                    </div>
                    <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label"><h4>Date de retour</h4></label>
                      <input type="date" class="form-control" value="<?php echo $result[0]['ending_date']; ?>" id="start" name="edate" >
                    </div>
                  
                      <button type="submit" name="Modifier" class="btn btn-outline-success">Modifier</button>
                      <button type="submit" name="Modifier" class="btn btn-outline-primary">Retour</button>
                    </form>
            </div>
        </div>
    </main>

<?php require('./../view/includes/footer.php'); ?>
