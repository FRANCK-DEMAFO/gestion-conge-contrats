<?php require('header.php')  ?>

        <section class="container col-lg-offset-3 col-lg-6">
            <h1> AJOUTER UN TYPE DE CONTRAT</h1>
               <div class="row">
                <div class="col-md-12 m-auto">           
                  <div class="section">
                  <div class="font1">
                    <div class="mb-6">
                      <label for="exampleFormControlInput1" class="form-label"><h5>nom_type_contrat</h5></label>
                      <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="name">
                    </div>
                    <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label"><h5>description</h5></label>
                      <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="description">
                    </div>
                    <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label"><h5>creation_date</h5></label>
                      <input type="date" class="form-control" id="start" placeholder="jj/mm/aaaa" value="">
                    </div>
                    <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label"><h5>modification_date</h5></label>
                      <input type="date" class="form-control" id="start" placeholder="jj/mm/aaaa" value="">
                    </div>
                  </div>
                  <button type="submit" class="btn btn-success t1">Ajouter</button>
                </div>
              </div>
            </div>
        </section>
<?php require('footer.php')  ?>