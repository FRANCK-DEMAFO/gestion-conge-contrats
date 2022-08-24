<?php

require_once('./../../core/Database/connection.php');
$conn = (new Database())->getConnection();
   if(isset($_POST['send'])){
    $name = htmlspecialchars($_POST['name']);
    $sdate = htmlspecialchars($_POST['leave_start_date']);
    $ld = htmlspecialchars($_POST['leave_duration']);

 if(!empty($name) and !empty($sdate)){
      $q = $conn->prepare("INSERT INTO conges(leave_start_date,id_employee,leave_duration) VALUES (?,?,?)");
      $q->execute(array($sdate,$name,$ld));
    }
  }
  header("location: index.php");
?>