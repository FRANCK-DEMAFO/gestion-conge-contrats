<?php 
require('./../view/includes/header.php');
$_SESSION['title'] = "Ajout d'un contrat";



require('./../../core/Database/connection.php');
$conn = (new Database())->getConnection();


if (isset($_POST['submit'])) {

	// print_r($_POST);

	$creation_date = date('Y-m-d H:i:s');
	$start_date = htmlentities($_POST['start_date']);
	$description = htmlentities($_POST['description']);
	$modification_date = date('Y-m-d H:i:s');
	$end_date = htmlentities($_POST['end_date']);
	$statut = 'active';
	$id_contract_type = htmlentities($_POST['id_contract_type']);
	$id_employee = htmlentities($_POST['id_employee']);
	$q = $conn->prepare("INSERT INTO contrats(creation_date, start_date, end_date, description,  modification_date, statut, 
		id_contract_type, id_employee, deleted) 
		VALUES(:creation_date, :start_date,  :end_date, :description, :modification_date, :statut, 
		:id_contract_type, :id_employee, :deleted)");

	$q->bindValue(':creation_date', $creation_date, \PDO::PARAM_STR);
	$q->bindValue(':start_date', $start_date, \PDO::PARAM_STR);
	$q->bindValue(':description', $description, \PDO::PARAM_STR);
	$q->bindValue(':modification_date', $modification_date, \PDO::PARAM_STR);
	$q->bindValue(':end_date', $end_date, \PDO::PARAM_STR);
	$q->bindValue(':statut', $statut, \PDO::PARAM_STR);
	$q->bindValue(':id_contract_type', $id_contract_type, \PDO::PARAM_INT);
	$q->bindValue(':id_employee', $id_employee, \PDO::PARAM_INT);
	$q->bindValue(':deleted', 0, \PDO::PARAM_BOOL);
	$q->execute();

	header('Location: IndexContrat.php');

	$_SESSION['erreur']='<center>ajout effectuer</center>';

}

?>
<section class="container col-lg-offset-3 col-lg-6">
	<h1> Ajouter un contrat</h1>
	<div class="row">
		<div class="col-md-12 m-auto">
			<div class="section">
				<form action="Ajoutercontrat.php" method="post">

					<div class="font1">

						<div class="mb-6">
							<label for="description" class="form-label"><strong>Non de Employe</strong></label>
							<select class="form-control" id="id_employee" name="id_employee" required>
								<option value="">Choisir un employe</option>
								<?php
								$conn = (new Database())->getConnection();
								foreach ($conn->query('SELECT*FROM employes') as $row) {
									echo '<option value="' . $row['id_employee'] . '">' . $row['name'] . '</option>';
								}
								?>
							</select>
						</div>
						<div class="mb-6">
							<label for="description" class="form-label"><strong>Nom du type de contrat</strong></label>
							<select class="form-control" id="id_contract_type" name="id_contract_type" required>
								<option value="">Choisir un type de contrat</option>
								<?php
								$conn = (new Database())->getConnection();
								foreach ($conn->query('SELECT*FROM type_contrats') as $row) {
									echo '<option value="' . $row['id_contract_type'] . '">' . $row['contract_type_name'] . '</option>';
								}
								?>
							</select>
						</div>

						<div class="mb-3">
							<label for="start_date" class="form-label"><strong>date de debut</strong></label>
							<input type="date" class="form-control" id="start_date" placeholder="jj/mm/aaaa" name="start_date" required>
						</div>
						<div class="mb-3">
							<label for="end_date" class="form-label"><strong>date de fin</strong></label>
							<input type="date" class="form-control" id="end_date" placeholder="jj/mm/aaaa" value="" name="end_date">
						</div>

						<div class="mb-6">
							<label for="description" class="form-label"><strong>description</strong></label>
							<textarea class="form-control" id="description" placeholder="" name="description" rows="3" required></textarea>
						</div>
					</div>
					<h1><strong> <a href="IndexContrat.php" class="btn btn-primary">retour</a>
							<button type="submit" class="btn btn-success" name="submit">Ajouter</button>
			</div>
			</form>

		</div>
	</div>
</section>

<?php require('./../view/includes/footer.php'); ?>