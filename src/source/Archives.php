<?php

if (!empty($_GET['archive'])) {

    $archive = checkInput($_GET['archive']);
    require('./../../core/Database/connection.php');
    $conn = (new Database())->getConnection();
    $q = $conn->prepare("SElECT conges.id_leave, conges.leave_start_date, conges.statut, conges.leave_duration, conges.id_employee,
                employes.name FROM conges LEFT JOIN employes ON conges.id_employee=employes.id_employee WHERE conges.disable=$archive");
    $q->execute();

    foreach ($q as $conge) {
        ?>
        <tr>
            <td><?= $conge['id_leave'] ?></td>
            <td><?= $conge['name'] ?></td>
            <td><?= $conge['leave_start_date'] ?></td>
            <td><?= $conge['leave_duration'] ?></td>
</div>
</div>
</div>
<?php
    }
?>
</tbody>

</table>
</div>
 

            
  <?php } ?>         
