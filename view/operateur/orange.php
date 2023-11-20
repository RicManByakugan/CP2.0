<?php 
	include '../../controller/operateur/orange.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../content/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../../content/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="../../content/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="../../content/plugins/jqvmap/jqvmap.min.css">
    <link rel="stylesheet" href="../../content/css/adminlte.min.css">
    <link rel="stylesheet" href="../../content/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="../../content/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="../../content/plugins/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" href="../../content/css/retouche.css">
    <style type="text/css">
		#preloader{position:fixed; top:0; left:0; right:0; bottom:0; background-color:#f4f6f9; z-index:99999}
		#status{width:200px; height:200px; position:absolute; left:50%; top:50%; background-image:url(../../data/fancybox_loading@2x.gif); background-repeat:no-repeat; background-position:center; margin:-100px 0 0 -100px}
	</style>
</head>
<body class="sidebar-mini layout-fixed sidebar-collapse" style="background-color: #e6e6e6">
	<div id="preloader">
		<div id="status">&nbsp;</div>
	</div>
  <div class="container-fluid wrapper">
	<div class="w-100">
		<div style="background: #f4f6f9">
			<div class="content-header">
			  <div class="container-fluid">
			    <div class="row">
			      <div class="col-sm-6">
			        <h1 class="m-0"><img src="../../content/image/orange.png" width="30" height="30" class="img-responsive mb-2 img-circle"> Orange</h1>
			      </div>
			      <div class="col-sm-6">
			        <ol class="breadcrumb float-sm-right">
			          <li class="breadcrumb-item "><?= date("d/m/Y") ?></li>
			        </ol>
			      </div>
			    </div>
			  </div>
			</div>

			<section class="content">
				<div class="container-fluid">
					<div class="row">
						  <div class="col-lg-2">
							  	<div class="small-box bg-warning">
					              <div class="inner">
					              	<div class="row">
					              		<div class="col-sm-6 text-left">
					                		<p class="mb-0 text-uppercase">Solde : </p>
					              		</div>
					              		<div class="col-sm-6 text-right">
					                		<p class="mb-0"><?= number_format($soldeOrangeAffiche); ?>Ar</p>
					              		</div>
					              	</div>
					              	<div class="row">
					              		<div class="col-sm-6 text-left">
					                		<p class="mb-0 text-uppercase">Espece : </p>
					              		</div>
					              		<div class="col-sm-6 text-right">
					                		<p class="mb-0"><?= number_format($EspeceSoldeAffiche); ?>Ar</p>
					              		</div>
					              	</div>
					              </div>
					            </div>
							  	<div class="small-box bg-light">
					              <div class="inner">
					              	<ul class="nav nav-pills flex-column">
					                  <?= $resHierToday; ?>
					                </ul>
					              </div>
					            </div>
					            <div class="info-box">
					              <?= $diffCountAffiche; ?>
					            </div>
					            <?php 
					            	if (!$VerD) {
					             ?>
					            <div class="card">
					            	<form method="POST">
					            		<button class="btn btn-block btn-outline-warning btn-sm" type="submit" name="finishDay">Finir la journée</button>
					            	</form>
					            </div>
					           	<?php } ?>
						  </div>
						  
				          <div class="col-lg-2">
					          <div class="card h-100">
					          	<div class="card-body">
					          		<form method="POST">
						          		<div class="w-100">
						            		<p class="mb-2">Ajout Solde</p>
						            		<input type="number" name="addSoldeOrange" class="form-control" placeholder="Ariary">
						            	</div>
						            	<div class="mt-2 w-100">
						            		<p class="mb-2">Ajout Espece</p>
						            		<input type="number" name="addEspece" class="form-control" placeholder="Ariary">
						            	</div>
						            	<div class="mt-2 w-100">
						            		<p class="mb-2">Raison</p>
						            		<input type="text" name="raisonAdd" class="form-control" placeholder="Raison" required>
						            	</div>
						            	<div class="mt-4 w-100">
						            		<button class="btn btn-block btn-outline-secondary btn-sm" type="submit" name="addingSomething">Entrer</button>
						            	</div>
					            	</form>
					          	</div>
					          </div>
				          </div>

				          <div class="col-lg-2">
					          <div class="card h-100">
					          	<div class="card-body">
					          		<form method="POST">
						          		<div class="w-100">
						            		<p class="mb-2">Retire Solde</p>
						            		<input type="number" name="subSoldeOrange" id="subSoldeOrange" class="form-control" placeholder="Ariary">
						            	</div>
						            	<div class="mt-2 w-100">
						            		<p class="mb-2">Retire Espece</p>
						            		<input type="number" name="subEspece" id="subEspece" class="form-control" placeholder="Ariary">
						            	</div>
						            	<div class="mt-2 w-100">
						            		<p class="mb-2">Raison</p>
						            		<input type="text" name="raisonSub" id="raisonSub" class="form-control" placeholder="Raison" required>
						            	</div>
						            	<div class="mt-4 w-100">
						            		<button class="btn btn-block btn-outline-secondary btn-sm" type="submit" name="subingSomething">Entrer</button>
						            	</div>
					            	</form>
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
					          		<form method="POST">
						          		<div class="w-100">
						            		<p class="mb-2">Numero</p>
						            		<input type="text" name="sendTNumero" class="form-control" placeholder="Numero" value="0322487719" required>
						            	</div>
						            	<div class="w-100">
						            		<p class="mb-2">Montant</p>
						            		<input type="text" name="sendTMontant" class="form-control" placeholder="Montant" required>
						            	</div>
						            	<div class="w-100">
						            		<p class="mb-2">Position</p>
						            		<select class="form-control" name="sendTPosition" required>
					                          <option>TANA</option>
					                          <option>EXTERIEURE</option>
					                        </select>
						            	</div>
						            	<div class="mt-4 w-100">
						            		<button class="btn btn-block btn-outline-secondary btn-sm" name="sendMoney">Entrer</button>
						            	</div>
					            	</form>
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
					          		<form method="POST">
						          		<div class="w-100">
						            		<p class="mb-2">Numero</p>
						            		<input type="text" name="retraitTNumero" class="form-control" placeholder="Numero" value="0322487719" required>
						            	</div>
						            	<div class="w-100">
						            		<p class="mb-2">Montant</p>
						            		<input type="text" name="retraitTMontant" class="form-control" placeholder="Montant" required>
						            	</div>
						            	<div class="mt-4 w-100">
						            		<button class="btn btn-block btn-outline-secondary btn-sm" name="retraitArgent">Entrer</button>
						            	</div>
					            	</form>
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
		            <h3 class="card-title">Transaction <?= isset($_POST['todayListe']) ? "aujourd'hui" : "";  ?></h3>

		            <div class="card-tools">
		            	<form method="POST">
			              <button class="btn btn-sm btn-outline-secondary" type="submit" name="todayListe">Aujourd'hui</button>
		            	</form>
		            </div>
		          </div>
		          <div class="card-body table-responsive p-0">
		            <table class="table table-hover text-nowrap table-bordered">
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
			              	<th>Raison</th>
		                </tr>
		              </thead>
		              <tbody>
		                	<?php 
		                		foreach ($listeTransaction as $key => $value) {
		                			if ($value['DescriptionSolde'] != NULL || $value['DescriptionEspece'] != NULL) {
		                	 ?>
				                <tr>
				            		<td><?= $value["idOp"] ?></td>
				            		<td><?= $value["DateOp"] ?></td>
				            		<td><?= $value["HeureOp"] ?></td>
				            		<td><?= $value["DescriptionSolde"] ?></td>
				            		<td><?= $value['MontantSolde'] == 0 ? "" : number_format($value["MontantSolde"]) ?></td>
				            		<td><?= $value["DescriptionEspece"] ?></td>
				            		<td><?= $value['MontantEspece'] == 0 ? "" : number_format($value["MontantEspece"]) ?></td>
				            		<td></td>
				            		<td></td>
				            		<td><?= number_format($value["Solde"]) ?></td>
				            		<td><?= number_format($value["Espece"]) ?></td>
				            		<td><?= $value["Raison"] ?></td>
				                </tr>
		            		<?php 
		            				}else{

		            		?>
		            			<tr>

				            		<td><?= $value["idOp"] ?></td>
				            		<td><?= $value["DateOp"] ?></td>
				            		<td><?= $value["HeureOp"] ?></td>
				            		<td><?= $value["Numero"] ?></td>
				            		<td><?= $value["Position"] ?></td>
				            		<td><?= $value["Envoie"] == 0 ? "" : number_format($value["Envoie"]) ?></td>
				            		<td><?= $value["Retrait"] == 0 ? "" : number_format($value["Retrait"]) ?></td>
				            		<td><?= $value["Bonus"] == 0 ? "" : number_format($value["Bonus"]) ?></td>
				            		<td><?= $value["Frais"] == 0 ? "" : number_format($value["Frais"]) ?></td>
				            		<td><?= number_format($value["Solde"]) ?></td>
				            		<td><?= number_format($value["Espece"]) ?></td>
				            		<td></td>
				                </tr>

		            		<?php 
		            				}
		            			}
		            		 ?>
		              </tbody>
		            </table>
		          </div>
		        </div>
		      </div>
		    </div>
		</div>


		
	</div>
  </div>
  <script src="../../content/plugins/jquery/jquery.min.js"></script>
  <script src="../../content/plugins/jquery-ui/jquery-ui.min.js"></script>
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <script src="../../content/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../content/plugins/chart.js/Chart.min.js"></script>
  <script src="../../content/plugins/sparklines/sparkline.js"></script>
  <script src="../../content/plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="../../content/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <script src="../../content/plugins/jquery-knob/jquery.knob.min.js"></script>
  <script src="../../content/plugins/moment/moment.min.js"></script>
  <script src="../../content/plugins/daterangepicker/daterangepicker.js"></script>
  <script src="../../content/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <script src="../../content/plugins/summernote/summernote-bs4.min.js"></script>
  <script src="../../content/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <script src="../../content/js/adminlte.js"></script>
  <script src="../../content/js/demo.js"></script>
  <script src="../../content/js/pages/dashboard.js"></script>

  <script src="../../content/js/loader/jquery.min.js"></script> 
  <script src="../../content/js/loader/wow.min.js"></script> 
  <script src="../../content/js/loader/loading.js"></script>
</body>
</html>