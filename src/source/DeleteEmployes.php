<?php

require('./../../core/Database/connection.php');
$conn = (new Database())->getConnection();
   if(isset($_GET['id']))
   { 
    $id=$_GET['id'];
       $q = $conn->prepare("UPDATE `employes` SET desactivate='0' WHERE id_employee =$id");
       $q->execute();
       $_SESSION['erreur'] = "Employé suprimer";
   }
   header("Location: IndexEmployes.php");
  
?>