<?php 
 require('./../view/includes/header.php');
$_SESSION['title'] = "Inseré un model de contrat";
  ?>


        <?php 
           require_once('./../../core/Database/connection.php');
           $conn = (new Database())->getConnection();
            if(isset($_POST['Ajouter'])){
             
               $id_type_contrat = $_POST['id_type_contrat'];
                $name = $_POST['name'];
                $model = $_POST['model'];
                $date_creation = date('Y-m-d');
                

                if(!empty($name) && !empty($model) && !empty($date_creation)){
                    $q=$conn->prepare("INSERT INTO models_contrats (id_type_contrat,model_name,model,date_creation) VALUES (?,?,?,?)");
                    $created = $q->execute(array($id_type_contrat,$name,$model,$date_creation));
                    if($created){
                      header("location:IndexModel.php");
                    }
                }
            }
        ?>
        

    <h1 class="titre" style="color:black;text-align: center;margin-top: 50px;"><strong>Models de Contrats</strong></h1> <br>
    <section  class="container col-lg-offset-3 col-lg-6">
      <h1> Ajouter un Model</h1>
        <form class="form" role="form" action="" method="post">

                  <div class="form-group" ><br>
                      <label class="form-group" for="id_type_contrat" name="id_type_contrat" > <strong> Nom du Type de Contrat:</strong></label>
                    <select type="text" class="form-control" id="id_type_contrat" name="id_type_contrat" required>
                      <option selected></option>
                        <?php
                                   $conn = (new Database())->getConnection();

                        foreach($conn->query('SELECT * FROM type_contrats') as $row){
                          echo '<option value = " '.$row['id_type_contrat']. ' ">' . $row['nom_type_contrat'] . '</option>';

                        }
                        ?>
                    </select>
                    
                  </div>
        
                    <div class="mb-3" ><br>
                      <label > <strong> Nom de Model de Contrat:</strong></label>
                      <input type="text" class="form-control" id="name" name="name" placeholder="nom" value="">
                    </div><br>
                      <div class="mb-6"><br>      
                      <label for="mytextarea" class="form-label"><h5>  <strong> Contenu du Model de Contrat:</strong></h5></label>        
                              <textarea id="mytextarea" name="model"></textarea>
                      </div><br>

                  </div>   
                </div>
              </div>
            </div><br><br>
              <div class="form-actions">
                  <button type="submit" class ="btn btn-success" name="Ajouter">Ajouter</a></button>
                                  <a href="IndexModel.php" class ="btn btn-primary"> Retour</a>
              </div>
        </form> 
    </section>
</body>
</html>

<?php require('./../view/includes/footer.php'); ?>
