<?php
session_start();
require_once('./../../core/Database/connection.php');
$conn = (new Database())->getConnection();
   if(isset($_POST['send'])){
    $name = htmlspecialchars($_POST['name']);
    $sdate = htmlspecialchars($_POST['leave_start_date']);
    $ld = htmlspecialchars($_POST['leave_duration']);

 if(!empty($name) and !empty($sdate and $ld<30)){
      $q = $conn->prepare("INSERT INTO conges(leave_start_date,id_employee,leave_duration) VALUES (?,?,?)");
      $q->execute(array($sdate,$name,$ld));

      $_SESSION['success'] = "<center>ajouter avec succes</center>";
   
    }
    if($ld>30){

    $_SESSION['erreur'] = "<center>verifier la duree que vous avez entrer</center>";

  }
  header("location: index.php");
}
?>