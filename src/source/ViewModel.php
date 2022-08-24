
<?php 
require('./../view/includes/header.php');
$_SESSION['title'] = "Detail sur model de contrat";
  
            
            if(!empty($_GET['id_model'])){
                $models_contrats=checkInput($_GET['id_model']);
            }

            require_once('./../../core/Database/connection.php');
            $conn = (new Database())->getConnection();
            $q = $conn->prepare(" SELECT models_contrats.id_model,type_contrats.contract_type_name AS id_contract_type , models_contrats.model_name, models_contrats.model, models_contrats.date_creation 
            FROM models_contrats LEFT JOIN type_contrats ON models_contrats.id_type_contrat=type_contrats.id_contract_type WHERE id_model=:id_model");
            $q->execute([
                'id_model'=> $_GET['id']
            ]);
            $models_contrats = $q->fetch(PDO::FETCH_ASSOC);
            function checkInput($data){
                $data=trim($data);
                $data=stripslashes($data);
                $data=htmlspecialchars($data);
                return $data;
            }

    ?> 
  



 <h1 class="titre" style="color:black;text-align: center;margin-top: 50px;"><strong>Models de Contrats</strong></h1> 
    <div class="container col-lg-offset-3 col-lg-6 ">
        <div class="row">
                <h2><strong>Detail du Model :</strong></h2>
                    <form >
                        <table class="table table-striped table-bordered" style="border-color: black;">
                            <thead>
                                <tr><br><br>
                                    <th>Id</th>
                                    <th>Nom du Type de Contrat</th>
                                    <th>Nom du Model de Contrat</th>
                                    <th>Date de Creation</th>
                                
                                </tr>
                            </thead>

                            <tbody>
                                <tr>  
                                    <td><?= ' ' .$models_contrats['id_model']; ?></td>
                                    <td><?= ' ' .$models_contrats['id_contract_type']; ?> </td>
                                    <td><?= ' ' .$models_contrats['model_name']; ?> </td>
                                    <td><?= ' ' .$models_contrats['date_creation']; ?></td>     
                                </tr>
                            </tbody>                             
                        </table>

                                <div> 
                                    <label ><br><br> <h4><strong>Contenu du Model de Contrat : </strong> </h4></label><td> <br><br> <div class="bg-light" style="text-align: center;">   <?php echo ' ' . $models_contrats['model']; ?> </div> </td>  
                                </div>

                   

                                    <div class="form-actions">
                                        <br><br><a href="IndexModel.php" class ="btn btn-primary"> <img src="./../../assets/bootstrap-icons/arrow-left.svg" alt=""> Retour</a>
                                    </div>
                    </form>       
        </div>
    </div>                            
</body>
</html>

<?php require('./../view/includes/footer.php'); ?>
