<?php

require_once('./../../core/Database/connection.php');
$conn = (new Database())->getConnection();
if (isset($_GET['id'])){
    $id = $_GET['id'];
    $q = $conn->prepare("UPDATE demande_permissions SET `deleted`=1 WHERE id_request=:id;");
    $q->bindValue(':id',$_GET['id']);
    $q->execute();
    header('Location:IndexDemande.php');
}


?>