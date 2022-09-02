<?php session_start(); 
  session_destroy();
  $_SESSION['erreur1'] = "A bientot !";
header('location: login.php');
?>