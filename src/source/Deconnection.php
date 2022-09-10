<?php session_start(); 
  session_destroy();
  $_SESSION['erreur'] = "A bientot !";
header('location: login.php');
?>