<?php

require('./../../core/Database/connection.php');
$conn = (new Database())->getConnection();

    
    if(isset($_GET['id']))
    { 
        $id= $_GET['id'];
        $q = $conn->prepare("UPDATE contrats  SET deleted=? WHERE id_contract=?;");
        $q->execute(array(1,$id));
        
    }
     $result = $q->fetch(PDO::FETCH_OBJ) ;  

    header("Location: IndexContrat.php");
?>
