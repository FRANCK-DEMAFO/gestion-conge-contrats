<?php 
 require('./../view/includes/header.php');
$_SESSION['title'] = "Inseré un model de contrat";
  ?>


        <?php 
           require_once('./../../core/Database/connection.php');
           $conn = (new Database())->getConnection();
            if(isset($_POST['Ajouter'])){
             
               $id_type_contrat = $_POST['id_contract_type'];
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
                      <label class="form-group" for="id_contract_type" name="id_contract_type" > <strong> Nom du Type de Contrat:</strong></label>
                    <select type="text" class="form-control" id="id_contract_type" name="id_contract_type" required>
                      <option selected></option>
                        <?php
                                   $conn = (new Database())->getConnection();

                        foreach($conn->query('SELECT * FROM type_contrats') as $row){
                          echo '<option value = " '.$row['id_contract_type']. ' ">' . $row['contract_type_name'] . '</option>';

                        }
                        ?>
                    </select>
                    
                  </div>
        
                    <div class="mb-3" ><br>
                        <label > <strong> Nom de Model de Contrat:</strong></label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="nom" value="">
                    </div><br>

                    <button type="button" class="btn btn-primary me-3" data-bs-toggle="modal" data-bs-target="#helpModal">
                        <i class="bi bi-question-circle"></i> Aide

                    </button>
                    <div class="modal fade" id="helpModal" tabindex="-1" aria-labelledby="helpModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                    <div class="modal-header bg-info">
                                          <h4 class="modal-title" id="helpModalLabel">Comment rediger un modèle de contrat ?</h4>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        L'editeur vous permet de saisir le contenu de votre modèle et d'y appliquer des mises en forme. Pour les informations devant être complétées lors de la génération des contrats, utilisez des "placeholders" qui sont documentés dans la Documentation du Model.
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-primary" data-bs-dismiss="modal"><i class="bi bi-check"></i> Compris</button>
                                    </div>
                              </div>
                        </div>
                  </div>
                                
                    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        Documentation du Model
                    </button>
                      
                      <div class="collapse" id="collapseExample" style="border-color: black;max-height:250px;overflow:auto;">
                        <div class="card card-body">
                              
                            <table class="table table-striped table-bordered" style="border-color:black;">
                                  <thead>
                                    <tr>
                                        <th>Thermes</th>
                                        <th>Significations</th>
                                    </tr>
                                  </thead>
                                  <tbody placeholder="">
                                    <tr>
                                        <td> company_name</td>
                                        <td>Nom de l'entreprise</td>
                                    </tr>
                                    <tr>
                                          <td>enrolment_n°</td>
                                          <td>n° enregistrement</td>
                                    </tr>
                                    <tr>
                                          <td>rules</td>
                                          <td>reglement</td>
                                    </tr>
                                    <tr>
                                          <td>cni_n°</td>
                                          <td>numero de cni</td>
                                    </tr>
                                    <tr>
                                          <td>employer_name</td>
                                          <td>Nom de l'employeur</td>
                                    </tr>
                                    <tr>
                                          <td>employed_name</td>
                                          <td> Nom de l'employé</td>
                                    </tr>
                                    <tr>
                                          <td>level</td>
                                          <td>niveau requis (etude)</td>
                                    </tr>
                                    <tr>
                                          <td>description</td>
                                          <td> detail sur le poste</td>
                                    </tr>
                                    <tr>
                                          <td>homework</td>
                                          <td> travail à effectuer</td>
                                    </tr>
                                    <tr>
                                          <td>work_location</td>
                                          <td> lieu de travail</td>
                                    </tr>
                                    <tr>
                                          <td>work_times</td>
                                          <td> heures de travail</td>
                                    </tr>
                                    <tr>
                                          <td>week_times</td>
                                          <td> heures par semaine</td>
                                    </tr>
                                    <tr>
                                          <td>begenning_date</td>
                                          <td> date de debut</td>
                                    </tr>
                                    <tr>
                                          <td>salary</td>
                                          <td> salaire</td>
                                    </tr>
                                    <tr>
                                          <td>end_date</td>
                                          <td> date de fin</td>
                                    </tr>
                                    <tr>
                                          <td>location</td>
                                          <td> lieu de travail</td>
                                    </tr>
                                    <tr>
                                          <td>on</td>
                                          <td> date</td>
                                    </tr>
                                    <tr>
                                          <td>employer_signature</td>
                                          <td> signature de l'employeur</td>
                                    </tr>
                                    <tr>
                                          <td>employed_signature</td>
                                          <td> signature de l'employé</td>
                                    </tr>
                                    <tr>
                                          <td>qualification</td>
                                          <td> niveau</td>
                                    </tr>
                                    <tr>
                                          <td>name</td>
                                          <td> nom</td>
                                    </tr>
                                    <tr>
                                          <td>country</td>
                                          <td> nationalité</td>
                                    </tr>
                                    <tr>
                                          <td>location</td>
                                          <td> lieu</td>
                                    </tr>
                                    <tr>
                                          <td>price</td>
                                          <td> salaire</td>
                                    </tr>
                                    <tr>
                                          <td>structure_name</td>
                                          <td> nom des ETS</td>
                                    </tr>
                                    <tr>
                                          <td>days_numbers</td>
                                          <td> nombres de jour</td>
                                    </tr>
                                    <tr>
                                          <td>on</td>
                                          <td> date</td>
                                    </tr>
                                  </tbody>
                            </table>
                        </div>
                      </div>
                      </div>


                      <div class="mb-6"><br>      
                      <label for="mytextarea" class="form-label"><h5>  <strong> Contenu du Model de Contrat:</strong></h5></label>        
                              <textarea id="mytextarea" name="model"></textarea>
                      </div><br>

                  </div>   
                </div>
              </div>
            </div>
            <div class="mb-3">
                  <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="is_current" value="1" id="">
                  <label class="form-check-label" for="">Définir comme modèle par défaut</label>
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
