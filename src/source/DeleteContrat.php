<?php
require('./../view/includes/header.php');
$_SESSION['title'] = "supprimer un contrat";

require('./../../core/Database/connection.php');
$conn = (new Database())->getConnection();

    
    if(isset($_GET['id']))
    { 
        $id= $_GET['id'];
        $q = $conn->prepare("UPDATE contrats  SET deleted=? WHERE id_contract=?;");
        $q->execute(array(1,$id));
        $_SESSION['erreur']='supression reussi';
        
   
        
    }
     
    $_SESSION['erreur']='<center>suppression reussi</center>';

    header("Location: IndexContrat.php");
?>
