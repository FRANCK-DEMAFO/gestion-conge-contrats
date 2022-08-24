
<?php  
 require_once('./../../core/Database/connection.php');
 $conn = (new Database())->getConnection();
  if(isset($_GET['id'])){
    $id= $_GET['id'];
    $q=$conn->prepare("UPDATE models_contrats SET deleted=? WHERE id_model=?;");
    $q->execute(array(0,$id));

  }
  header("location: IndexModel.php");
?>

