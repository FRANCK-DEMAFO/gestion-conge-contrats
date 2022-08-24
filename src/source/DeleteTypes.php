<?php

require('./../../core/Database/connection.php');
        $conn = (new Database())->getConnection();
if (isset($_GET['id'])){
    $id=$_GET['id'];
$q = $conn->prepare( "UPDATE type_contrats SET suppression=? WHERE id_contract_type= ?;" );
$q->execute(array(0,$id));
}
header("Location:IndexTypes.php");
?>
