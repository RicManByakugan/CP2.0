<div style="background: #f4f6f9">
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row">
	      <div class="col-sm-6">
	        <h1 class="m-0"><img src="content/image/telma.png" width="30" height="30" class="img-responsive mb-2"> Telma</h1>
	      </div>
	      <div class="col-sm-6">
	        <ol class="breadcrumb float-sm-right">
	          <li class="breadcrumb-item ">Date | Heure</li>
	        </ol>
	      </div>
	    </div>
	  </div>
	</div>

	<section class="content">
		<div class="container-fluid">
			<div class="row">
				  <div class="col-lg-2">
					  	<div class="small-box bg-secondary">
			              <div class="inner">
			              	<div class="row">
			              		<div class="col-sm-6 text-left">
			                		<p class="mb-0 text-uppercase">Solde : </p>
			              		</div>
			              		<div class="col-sm-6 text-right">
			                		<p class="mb-0">200000Ar</p>
			              		</div>
			              	</div>
			              	<div class="row">
			              		<div class="col-sm-6 text-left">
			                		<p class="mb-0 text-uppercase">Espece : </p>
			              		</div>
			              		<div class="col-sm-6 text-right">
			                		<p class="mb-0">200000Ar</p>
			              		</div>
			              	</div>
			              </div>
			            </div>
				  </div>

		          <div class="col-lg-2">
			          <div class="card h-100">
			          	<div class="card-body">
			          		<div class="w-100">
			            		<p class="mb-2">Ajout Solde</p>
			            		<input type="number" name="addSoldeTelma" id="addSoldeTelma" class="form-control" placeholder="Ariary">
			            	</div>
			            	<div class="mt-2 w-100">
			            		<p class="mb-2">Ajout Espece</p>
			            		<input type="number" name="addEspece" id="addEspece" class="form-control" placeholder="Ariary">
			            	</div>
			            	<div class="mt-2 w-100">
			            		<p class="mb-2">Raison</p>
			            		<input type="text" name="raisonAdd" id="raisonAdd" class="form-control" placeholder="Raison">
			            	</div>
			            	<div class="mt-4 w-100">
			            		<button class="btn btn-block btn-outline-secondary btn-sm bg-white">Entrer</button>
			            	</div>
			          	</div>
			          </div>
		          </div>

		          <div class="col-lg-2">
			          <div class="card h-100">
			          	<div class="card-body">
			          		<div class="w-100">
			            		<p class="mb-2">Retire Solde</p>
			            		<input type="number" name="subSoldeTelma" id="subSoldeTelma" class="form-control" placeholder="Ariary">
			            	</div>
			            	<div class="mt-2 w-100">
			            		<p class="mb-2">Retire Espece</p>
			            		<input type="number" name="subEspece" id="subEspece" class="form-control" placeholder="Ariary">
			            	</div>
			            	<div class="mt-2 w-100">
			            		<p class="mb-2">Raison</p>
			            		<input type="text" name="raisonSub" id="raisonSub" class="form-control" placeholder="Raison">
			            	</div>
			            	<div class="mt-4 w-100">
			            		<button class="btn btn-block btn-outline-secondary btn-sm">Entrer</button>
			            	</div>
			          	</div>
			          </div>
		          </div>

		          <div class="col-lg-3">
			          <div class="card h-100">
			          	<div class="card-header border-0 ui-sortable-handle">
				            <h3 class="card-title">
				              <i class="fa fa-chevron-circle-up mr-1"></i>
				              Envoie d'argent
				            </h3>
			          	</div><hr class="mt-0 mb-0">
			          	<div class="card-body">
			          		<div class="w-100">
			            		<p class="mb-2">Numero</p>
			            		<input type="text" name="sendTNumero" id="sendTNumero" class="form-control" placeholder="Numero" value="0342487719">
			            	</div>
			            	<div class="w-100">
			            		<p class="mb-2">Montant</p>
			            		<input type="text" name="sendTMontant" id="sendTMontant" class="form-control" placeholder="Montant">
			            	</div>
			            	<div class="w-100">
			            		<p class="mb-2">Position</p>
			            		<select class="form-control" name="sendTPosition" id="sendTPosition">
		                          <option>TANA</option>
		                          <option>EXTERIEURE</option>
		                        </select>
			            	</div>
			            	<div class="mt-4 w-100">
			            		<button class="btn btn-block btn-outline-secondary btn-sm">Entrer</button>
			            	</div>
			          	</div>
			          </div>
		          </div>

		          <div class="col-lg-3">
			          <div class="card h-100">
			          	<div class="card-header border-0 ui-sortable-handle">
				            <h3 class="card-title">
				              <i class="fa fa-chevron-circle-down mr-1"></i>
				              Retrait d'argent
				            </h3>
			          	</div><hr class="mt-0 mb-0">
			          	<div class="card-body">
			          		<div class="w-100">
			            		<p class="mb-2">Numero</p>
			            		<input type="text" name="retraitTNumero" id="retraitTNumero" class="form-control" placeholder="Numero" value="0342487719">
			            	</div>
			            	<div class="w-100">
			            		<p class="mb-2">Montant</p>
			            		<input type="text" name="retraitTMontant" id="retraitTMontant" class="form-control" placeholder="Montant">
			            	</div>
			            	<div class="mt-4 w-100">
			            		<button class="btn btn-block btn-outline-secondary btn-sm">Entrer</button>
			            	</div>
			          	</div>
			          </div>
		          </div>
	        </div>
	  	</div>
	</section>
	<hr>
	<div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Transaction</h3>

            <div class="card-tools">
	              <button class="btn btn-sm btn-outline-secondary">Aujourd'hui</button>
	              <button class="btn btn-sm btn-outline-secondary">Tout</button>
            </div>
          </div>
          <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
              <thead>
                <tr>
	              	<th>Numéro</th>
	              	<th>Date</th>
	              	<th>Heure</th>
	              	<th>Numéro</th>
	              	<th>Position</th>
	              	<th>Envoie</th>
	              	<th>Retrait</th>
	              	<th>Bonus</th>
	              	<th>Frais</th>
	              	<th>Solde</th>
	              	<th>Espece</th>
                </tr>
              </thead>
              <tbody>
                <tr>
            		<td></td>
            		<td></td>
            		<td></td>
            		<td></td>
            		<td></td>
            		<td></td>
            		<td></td>
            		<td></td>
            		<td></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

</div>