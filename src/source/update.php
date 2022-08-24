<?php

require_once('./../../core/Database/connection.php');
$conn = (new Database())->getConnection();
   if(isset($_GET['id'])){
    
   if(isset($_POST['send'])){
    $sdate = htmlspecialchars($_POST['leave_start_date']);
    $edate = htmlspecialchars($_POST['leave_end_date']);
    $ld = htmlspecialchars($_POST['leave_duration']);
    if(!empty($sdate) and !empty($edate)){
        $id = $_GET['id'];
      $q = $conn->prepare("UPDATE conges SET leave_start_date=?, leave_end_date=?, leave_duration=?  WHERE id_leave = ?");
      $q->execute(array($sdate,$edate,$ld,$id));

    }
  }
 }
  header("location: index.php");
?>