<?php 
	include '../../controller/operateur/accp.php';
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
    <link rel="stylesheet" href="../../content/plugins/fontawesome-free/css/all.min.css">
	<link rel="stylesheet" href="../../content/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  	<link rel="stylesheet" href="../../content/plugins/toastr/toastr.min.css">
  	<style type="text/css">
		#preloader{position:fixed; top:0; left:0; right:0; bottom:0; background-color:#f4f6f9; z-index:99999}
		#status{width:200px; height:200px; position:absolute; left:50%; top:50%; background-image:url(../../data/fancybox_loading@2x.gif); background-repeat:no-repeat; background-position:center; margin:-100px 0 0 -100px}
	</style>
</head>
<body class="sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed" style="background-color: #e6e6e6">
	<div id="preloader">
		<div id="status">&nbsp;</div>
	</div>
	<div class="modal fade" id="modalRapport">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<div class="modal-header">
	              <h4 class="modal-title">ACCP</h4>
	              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                <span aria-hidden="true">×</span>
	              </button>
	            </div>
				<div class="modal-body">
					<div class="container-fluid">
			      		<div class="card">
			      			<div class="card-header">
				                <h3 class="m-0 card-title">Rapport journée</h3>
				                <h6 class="m-0 float-right"><?= date("d/m/Y") ?></h6>
			      			</div>
			      			<div class="card-body">
			      				<div class="container-fluid">
				      				<div class="row">
				      					<div class="col-sm-3">
				      						<div class="card">
				      							<div class="card-header">
				                					<h3 class="m-0 card-title">Appel</h3>
				      							</div>
				      							<div class="card-body">
				      								<?php 
				      									if (empty($verDay1)) {
				      								?>
							      						<form method="POST">
											          		<div class="w-100">
											            		<p class="mb-2"><img src="../../content/image/telma.png" width="15" height="15" class="img-responsive mb-1 img-circle"> Telma</p>
											            		<input type="number" name="telmaAppelDay" class="form-control" required placeholder="<?= number_format($data[0]['nombre']) ?>Ar">
											            	</div>
											            	<div class="mt-2 w-100">
											            		<p class="mb-2"><img src="../../content/image/airtel.png" width="15" height="15" class="img-responsive mb-1 img-circle"> Airtel</p>
											            		<input type="number" name="airtelAppelDay" class="form-control" required placeholder="<?= number_format($data[1]['nombre']) ?>Ar">
											            	</div>
											            	<div class="mt-2 w-100">
											            		<p class="mb-2"><img src="../../content/image/orange.png" width="15" height="15" class="img-responsive mb-1 img-circle"> Orange</p>
											            		<input type="number" name="orangeAppelDay" class="form-control" required placeholder="<?= number_format($data[2]['nombre']) ?>Ar" required>
											            	</div>
											            	<div class="mt-4 w-100">
											            		<button class="btn btn-block btn-outline-secondary btn-sm" type="submit" name="appelDay">Entrer</button>
											            	</div>
										            	</form>
									            	<?php 
									            		}else{
									            			foreach ($verDay1 as $key => $value) {
									            				if ($value['Operateur'] == "TELMA") {
									            					$bg = "success";
									            				}elseif ($value['Operateur'] == "AIRTEL") {
									            					$bg = "danger";
									            				}elseif ($value['Operateur'] == "ORANGE") {
									            					$bg = "warning";
									            				}else{
									            					$bg = "secondary";
									            				}
									            	?>
										            		<div class="small-box bg-<?= $bg ?>">
			            										<div class="inner">
												            		<div class="row">
												            			<div class="col-sm-6 text-left">
												            				<?= $value['Operateur'] ?> : 
												            			</div>
												            			<div class="col-sm-6 text-right">
												            				<?= number_format($value['Vente']) ?> Ar
												            			</div>
												            		</div>
											            		</div>
											            	</div>
									            	<?php }} ?>
								            	</div>
							            	</div>
				      					</div>
				      					<div class="col-sm-3">
				      						<div class="card">
				      							<div class="card-header">
				                					<h3 class="m-0 card-title">Crédit</h3>
				      							</div>
				      							<div class="card-body">
				      								<?php 
				      									if (empty($verDay2)) {
				      								?>
							      						<form method="POST">
											          		<div class="w-100">
											            		<p class="mb-2"><img src="../../content/image/telma.png" width="15" height="15" class="img-responsive mb-1 img-circle"> Telma</p>
											            		<input type="number" name="telmaCredit" class="form-control" placeholder="<?= number_format($data[9]['nombre']) ?>Ar">
											            	</div>
											            	<div class="mt-2 w-100">
											            		<p class="mb-2"><img src="../../content/image/airtel.png" width="15" height="15" class="img-responsive mb-1 img-circle"> Airtel</p>
											            		<input type="number" name="airtelCredit" class="form-control" placeholder="<?= number_format($data[10]['nombre']) ?>Ar">
											            	</div>
											            	<div class="mt-2 w-100">
											            		<p class="mb-2"><img src="../../content/image/orange.png" width="15" height="15" class="img-responsive mb-1 img-circle"> Orange</p>
											            		<input type="number" name="orangeCredit" class="form-control" placeholder="<?= number_format($data[11]['nombre']) ?>Ar" required>
											            	</div>
											            	<div class="mt-4 w-100">
											            		<button class="btn btn-block btn-outline-secondary btn-sm" type="submit" name="creditDay">Entrer</button>
											            	</div>
										            	</form>
									            	<?php 
									            		}else{
									            			foreach ($verDay2 as $key => $value) {
									            				if ($value['Operateur'] == "TELMA") {
									            					$bg = "success";
									            				}elseif ($value['Operateur'] == "AIRTEL") {
									            					$bg = "danger";
									            				}elseif ($value['Operateur'] == "ORANGE") {
									            					$bg = "warning";
									            				}else{
									            					$bg = "secondary";
									            				}
									            	?>
										            		<div class="small-box bg-<?= $bg ?>">
			            										<div class="inner">
												            		<div class="row">
												            			<div class="col-sm-6 text-left">
												            				<?= $value['Operateur'] ?> : 
												            			</div>
												            			<div class="col-sm-6 text-right">
												            				<?= number_format($value['Vente']) ?> Ar
												            			</div>
												            		</div>
											            		</div>
											            	</div>
									            	<?php }} ?>
								            	</div>
							            	</div>
				      					</div>
				      					<div class="col-sm-3">
				      						<div class="card">
				      							<div class="card-header">
				                					<h3 class="m-0 card-title">Cartes</h3>
				      							</div>
				      							<div class="card-body">
				      								<?php 
				      									if (empty($verDay3)) {
				      								?>
							      						<form method="POST">
											          		<div class="w-100">
											            		<p class="mb-2"><img src="../../content/image/telma.png" width="15" height="15" class="img-responsive mb-1 img-circle"> Telma</p>
											            		<input type="number" name="telmaCarte" class="form-control" placeholder="<?= number_format($data[6]['nombre']) ?>">
											            	</div>
											            	<div class="mt-2 w-100">
											            		<p class="mb-2"><img src="../../content/image/airtel.png" width="15" height="15" class="img-responsive mb-1 img-circle"> Airtel</p>
											            		<input type="number" name="airtelCarte" class="form-control" placeholder="<?= number_format($data[7]['nombre']) ?>">
											            	</div>
											            	<div class="mt-2 w-100">
											            		<p class="mb-2"><img src="../../content/image/orange.png" width="15" height="15" class="img-responsive mb-1 img-circle"> Orange</p>
											            		<input type="number" name="orangeCarte" class="form-control" placeholder="<?= number_format($data[8]['nombre']) ?>" required>
											            	</div>
											            	<div class="mt-4 w-100">
											            		<button class="btn btn-block btn-outline-secondary btn-sm" type="submit" name="carteDay">Entrer</button>
											            	</div>
										            	</form>
									            	<?php 
									            		}else{
									            			foreach ($verDay3 as $key => $value) {
									            				if ($value['Operateur'] == "TELMA") {
									            					$bg = "success";
									            				}elseif ($value['Operateur'] == "AIRTEL") {
									            					$bg = "danger";
									            				}elseif ($value['Operateur'] == "ORANGE") {
									            					$bg = "warning";
									            				}else{
									            					$bg = "secondary";
									            				}
									            	?>
										            		<div class="small-box bg-<?= $bg ?>">
			            										<div class="inner">
												            		<div class="row">
												            			<div class="col-sm-6 text-left">
												            				<?= $value['Operateur'] ?> : 
												            			</div>
												            			<div class="col-sm-6 text-right">
												            				<?= number_format($value['Vente']) ?>
												            			</div>
												            		</div>
											            		</div>
											            	</div>
									            	<?php }} ?>
								            	</div>
							            	</div>
				      					</div>
				      					<div class="col-sm-3">
				      						<div class="card">
				      							<div class="card-header">
				                					<h3 class="m-0 card-title">Puces</h3>
				      							</div>
				      							<div class="card-body">
				      								<?php 
				      									if (empty($verDay4)) {
				      								?>
							      						<form method="POST">
											          		<div class="w-100">
											            		<p class="mb-2"><img src="../../content/image/telma.png" width="15" height="15" class="img-responsive mb-1 img-circle"> Telma</p>
											            		<input type="number" name="telmaPuce" class="form-control" placeholder="<?= number_format($data[3]['nombre']) ?>">
											            	</div>
											            	<div class="mt-2 w-100">
											            		<p class="mb-2"><img src="../../content/image/airtel.png" width="15" height="15" class="img-responsive mb-1 img-circle"> Airtel</p>
											            		<input type="number" name="airtelPuce" class="form-control" placeholder="<?= number_format($data[4]['nombre']) ?>">
											            	</div>
											            	<div class="mt-2 w-100">
											            		<p class="mb-2"><img src="../../content/image/orange.png" width="15" height="15" class="img-responsive mb-1 img-circle"> Orange</p>
											            		<input type="number" name="orangePuce" class="form-control" placeholder="<?= number_format($data[5]['nombre']) ?>" required>
											            	</div>
											            	<div class="mt-4 w-100">
											            		<button class="btn btn-block btn-outline-secondary btn-sm" type="submit" name="puceDay">Entrer</button>
											            	</div>
										            	</form>
										            <?php 
									            		}else{
									            			foreach ($verDay4 as $key => $value) {
									            				if ($value['Operateur'] == "TELMA") {
									            					$bg = "success";
									            				}elseif ($value['Operateur'] == "AIRTEL") {
									            					$bg = "danger";
									            				}elseif ($value['Operateur'] == "ORANGE") {
									            					$bg = "warning";
									            				}else{
									            					$bg = "secondary";
									            				}
									            	?>
										            		<div class="small-box bg-<?= $bg ?>">
			            										<div class="inner">
												            		<div class="row">
												            			<div class="col-sm-6 text-left">
												            				<?= $value['Operateur'] ?> : 
												            			</div>
												            			<div class="col-sm-6 text-right">
												            				<?= number_format($value['Vente']) ?>
												            			</div>
												            		</div>
											            		</div>
											            	</div>
									            	<?php }} ?>
								            	</div>
							            	</div>
				      					</div>
				      				</div>
			      				</div>
			      			</div>
					    </div>
				    </div>
				</div>
			</div>
		</div>
	</div>

	<div style="background: #f4f6f9">
		<div class="content-header">
		  <div class="container-fluid">
		    <div class="row">
		      <div class="col-sm-6">
		        <h1 class="m-0">ACCP</h1>
		      </div>
		      <div class="col-sm-6">
		        <ol class="breadcrumb float-sm-right">
		          <li class="breadcrumb-item "><?= date("d/m/Y") ?></li>
		        </ol>
		      </div>
		    </div>
		  </div>
		</div>
		<div class="container-fluid">
      	 	<div class="float-left">
		  		<div class="small-box bg-secondary">
		            <div class="inner">
		            	<div class="row">
		            		<div class="col-sm-4 text-left">
				                <p class="mb-0 text-uppercase">Espece</p>
		            		</div>
		            		<div class="col-sm-8 text-right">
		                		<p class="mb-0"><?= number_format($dataEspece) ?>Ar</p>
		            		</div>
		            	</div>
	      			</div>
  				</div>
  				<div class="mt-2">
  					<div class="card h-100">
  						<div class="card-header">
  							<form method="POST">
	  							<div class="w-100">
				            		<p class="mb-2">Ajout Espece</p>
				            		<input type="number" name="addEspeceACCP" class="form-control" placeholder="Ariary" min="0">
				            	</div>
				            	<div class="mt-2 w-100">
				            		<p class="mb-2">Retire Espece</p>
				            		<input type="number" name="subEspeceACCP" class="form-control" placeholder="Ariary" min="0">
				            	</div>
				            	<div class="mt-2 w-100">
				            		<p class="mb-2">Raison</p>
				            		<input type="text" name="raisonACCP" class="form-control" placeholder="Raison" required>
				            	</div>
				            	<div class="mt-4 w-100">
				            		<button class="btn btn-block btn-outline-secondary btn-sm" type="submit" name="EsACCP">Entrer</button>
				            	</div>
			            	</form>
  						</div>
  					</div>
  				</div>
	  	  	</div>
      		<div class="row">
			      <div class="col-lg-3">
			      	<div class="card h-100">
			      		<div class="card-header">
			                <h3 class="m-0 card-title">Appel</h3>
			      		</div>
			      		<div class="card-body">
			      			<div class="small-box bg-success" data-toggle="collapse" data-target="#appelTelmaForm">
					            <div class="inner">
					            	<div class="row">
					            		<div class="col-sm-6 text-left">
							                <p class="mb-0 text-uppercase"><img src="../../content/image/telma.png" width="15" height="15" class="img-responsive mb-1 img-circle"> Telma : </p>
					            		</div>
					            		<div class="col-sm-6 text-right">
					                		<p class="mb-0"><?= number_format($data[0]['nombre']) ?>Ar</p>
					            		</div>
					            	</div>
				      			</div>
			      			</div>
			      			<div class="collapse" id="appelTelmaForm">
				      			<div class="small-box bg-light p-2">
				      				<form method="POST">
			  							<div class="w-100">
						            		<p class="mb-2">Ajout</p>
						            		<input type="number" name="addappelTelmaForm" class="form-control" placeholder="Ariary" min="0">
						            	</div>
						            	<div class="mt-2 w-100">
						            		<p class="mb-2">Retire</p>
						            		<input type="number" name="subappelTelmaForm" class="form-control" placeholder="Ariary" min="0">
						            	</div>
						            	<div class="mt-2 w-100">
						            		<p class="mb-2">Raison</p>
						            		<input type="text" name="raisonappelTelmaForm" class="form-control" placeholder="Raison" required>
						            	</div>
						            	<div class="mt-4 w-100">
						            		<button class="btn btn-block btn-outline-secondary btn-sm" type="submit" name="appelTelmaFormEsACCP">Entrer</button>
						            	</div>
					            	</form>
				      			</div>
			      			</div>

			      			<div class="small-box bg-danger" data-toggle="collapse" data-target="#appelAirtelForm">
					            <div class="inner">
					            	<div class="row">
					            		<div class="col-sm-6 text-left">
							                <p class="mb-0 text-uppercase"><img src="../../content/image/airtel.png" width="15" height="15" class="img-responsive mb-1 img-circle"> Airtel : </p>
					            		</div>
					            		<div class="col-sm-6 text-right">
					                		<p class="mb-0"><?= number_format($data[1]['nombre']) ?>Ar</p>
					            		</div>
					            	</div>
				      			</div>
			      			</div>
			      			<div class="collapse" id="appelAirtelForm">
				      			<div class="small-box bg-light p-2">
				      				<form method="POST">
			  							<div class="w-100">
						            		<p class="mb-2">Ajout</p>
						            		<input type="number" name="addappelAirtelForm" class="form-control" placeholder="Ariary" min="0">
						            	</div>
						            	<div class="mt-2 w-100">
						            		<p class="mb-2">Retire</p>
						            		<input type="number" name="subappelAirtelForm" class="form-control" placeholder="Ariary" min="0">
						            	</div>
						            	<div class="mt-2 w-100">
						            		<p class="mb-2">Raison</p>
						            		<input type="text" name="raisonappelAirtelForm" class="form-control" placeholder="Raison" required>
						            	</div>
						            	<div class="mt-4 w-100">
						            		<button class="btn btn-block btn-outline-secondary btn-sm" type="submit" name="appelAirtelFormEsACCP">Entrer</button>
						            	</div>
					            	</form>
				      			</div>
			      			</div>

			      			<div class="small-box bg-warning" data-toggle="collapse" data-target="#appelOrangeForm">
					            <div class="inner">
					            	<div class="row">
					            		<div class="col-sm-6 text-left">
							                <p class="mb-0 text-uppercase"><img src="../../content/image/orange.png" width="15" height="15" class="img-responsive mb-1 img-circle"> Orange : </p>
					            		</div>
					            		<div class="col-sm-6 text-right">
					                		<p class="mb-0"><?= number_format($data[2]['nombre']) ?>Ar</p>
					            		</div>
					            	</div>
				      			</div>
			      			</div>
			      			<div class="collapse" id="appelOrangeForm">
				      			<div class="small-box bg-light p-2">
				      				<form method="POST">
			  							<div class="w-100">
						            		<p class="mb-2">Ajout</p>
						            		<input type="number" name="addappelOrangeForm" class="form-control" placeholder="Ariary" min="0">
						            	</div>
						            	<div class="mt-2 w-100">
						            		<p class="mb-2">Retire</p>
						            		<input type="number" name="subappelOrangeForm" class="form-control" placeholder="Ariary" min="0">
						            	</div>
						            	<div class="mt-2 w-100">
						            		<p class="mb-2">Raison</p>
						            		<input type="text" name="raisonappelOrangeForm" class="form-control" placeholder="Raison" required>
						            	</div>
						            	<div class="mt-4 w-100">
						            		<button class="btn btn-block btn-outline-secondary btn-sm" type="submit" name="appelOrangeFormEsACCP">Entrer</button>
						            	</div>
					            	</form>
				      			</div>
			      			</div>

			      			<button class="btn btn-block btn-outline-secondary" data-toggle="modal" data-target="#modalRapport">Rapport journée</button>
			      		</div>
			      	</div>
			      </div>
			      <div class="col-lg-3">
			      	<div class="card h-100">
			      		<div class="card-header">
			                <h3 class="m-0 card-title">Crédit</h3>
			      		</div>
			      		<div class="card-body">
			      			<div class="small-box bg-success" data-toggle="collapse" data-target="#creditTelmaForm">
					            <div class="inner">
					            	<div class="row">
					            		<div class="col-sm-6 text-left">
							                <p class="mb-0 text-uppercase"><img src="../../content/image/telma.png" width="15" height="15" class="img-responsive mb-1 img-circle"> Telma : </p>
					            		</div>
					            		<div class="col-sm-6 text-right">
					                		<p class="mb-0"><?= number_format($data[9]['nombre']) ?>Ar</p>
					            		</div>
					            	</div>
				      			</div>
			      			</div>
			      			<div class="collapse" id="creditTelmaForm">
				      			<div class="small-box bg-light p-2">
				      				<form method="POST">
			  							<div class="w-100">
						            		<p class="mb-2">Ajout</p>
						            		<input type="number" name="addcreditTelmaForm" class="form-control" placeholder="Ariary" min="0">
						            	</div>
						            	<div class="mt-2 w-100">
						            		<p class="mb-2">Retire</p>
						            		<input type="number" name="subcreditTelmaForm" class="form-control" placeholder="Ariary" min="0">
						            	</div>
						            	<div class="mt-2 w-100">
						            		<p class="mb-2">Raison</p>
						            		<input type="text" name="raisoncreditTelmaForm" class="form-control" placeholder="Raison" required>
						            	</div>
						            	<div class="mt-4 w-100">
						            		<button class="btn btn-block btn-outline-secondary btn-sm" type="submit" name="creditTelmaFormEsACCP">Entrer</button>
						            	</div>
					            	</form>
				      			</div>
			      			</div>
			      			<div class="small-box bg-danger"  data-toggle="collapse" data-target="#creditAirtelForm">
					            <div class="inner">
					            	<div class="row">
					            		<div class="col-sm-6 text-left">
							                <p class="mb-0 text-uppercase"><img src="../../content/image/airtel.png" width="15" height="15" class="img-responsive mb-1 img-circle"> Airtel : </p>
					            		</div>
					            		<div class="col-sm-6 text-right">
					                		<p class="mb-0"><?= number_format($data[10]['nombre']) ?>Ar</p>
					            		</div>
					            	</div>
				      			</div>
			      			</div>
			      			<div class="collapse" id="creditAirtelForm">
				      			<div class="small-box bg-light p-2">
				      				<form method="POST">
			  							<div class="w-100">
						            		<p class="mb-2">Ajout</p>
						            		<input type="number" name="addcreditAirtelForm" class="form-control" placeholder="Ariary" min="0">
						            	</div>
						            	<div class="mt-2 w-100">
						            		<p class="mb-2">Retire</p>
						            		<input type="number" name="subcreditAirtelForm" class="form-control" placeholder="Ariary" min="0">
						            	</div>
						            	<div class="mt-2 w-100">
						            		<p class="mb-2">Raison</p>
						            		<input type="text" name="raisoncreditAirtelForm" class="form-control" placeholder="Raison" required>
						            	</div>
						            	<div class="mt-4 w-100">
						            		<button class="btn btn-block btn-outline-secondary btn-sm" type="submit" name="creditAirtelFormEsACCP">Entrer</button>
						            	</div>
					            	</form>
				      			</div>
			      			</div>

			      			<div class="small-box bg-warning" data-toggle="collapse" data-target="#creditOrangeForm">
					            <div class="inner">
					            	<div class="row">
					            		<div class="col-sm-6 text-left">
							                <p class="mb-0 text-uppercase"><img src="../../content/image/orange.png" width="15" height="15" class="img-responsive mb-1 img-circle"> Orange : </p>
					            		</div>
					            		<div class="col-sm-6 text-right">
					                		<p class="mb-0"><?= number_format($data[11]['nombre']) ?>Ar</p>
					            		</div>
					            	</div>
				      			</div>
			      			</div>
			      			<div class="collapse" id="creditOrangeForm">
				      			<div class="small-box bg-light p-2">
				      				<form method="POST">
			  							<div class="w-100">
						            		<p class="mb-2">Ajout</p>
						            		<input type="number" name="addcreditOrangeForm" class="form-control" placeholder="Ariary" min="0">
						            	</div>
						            	<div class="mt-2 w-100">
						            		<p class="mb-2">Retire</p>
						            		<input type="number" name="subcreditOrangeForm" class="form-control" placeholder="Ariary" min="0">
						            	</div>
						            	<div class="mt-2 w-100">
						            		<p class="mb-2">Raison</p>
						            		<input type="text" name="raisoncreditOrangeForm" class="form-control" placeholder="Raison" required>
						            	</div>
						            	<div class="mt-4 w-100">
						            		<button class="btn btn-block btn-outline-secondary btn-sm" type="submit" name="creditOrangeFormEsACCP">Entrer</button>
						            	</div>
					            	</form>
				      			</div>
			      			</div>

			      			<button class="btn btn-block btn-outline-secondary" data-toggle="modal" data-target="#modalRapport">Rapport journée</button>
			      		</div>
			      	</div>
			      </div>
			      <div class="col-lg-3">
			      	<div class="card h-100">
			      		<div class="card-header">
			                <h3 class="m-0 card-title">Cartes (<?= number_format($data[6]["nombre"] + $data[7]["nombre"] +$data[8]["nombre"]) ?>)</h3>
			      		</div>
			      		<div class="card-body">
			      			<div class="small-box bg-success"  data-toggle="collapse" data-target="#carteTelmaForm">
					            <div class="inner">
					            	<div class="row">
					            		<div class="col-sm-6 text-left">
							                <p class="mb-0 text-uppercase"><img src="../../content/image/telma.png" width="15" height="15" class="img-responsive mb-1 img-circle"> Telma : </p>
					            		</div>
					            		<div class="col-sm-6 text-right">
					                		<p class="mb-0"><?= number_format($data[6]['nombre']) ?></p>
					            		</div>
					            	</div>
				      			</div>
			      			</div>
			      			<div class="collapse" id="carteTelmaForm">
				      			<div class="small-box bg-light p-2">
				      				<form method="POST">
			  							<div class="w-100">
						            		<p class="mb-2">Ajout</p>
						            		<input type="number" name="addcarteTelmaForm" class="form-control" placeholder="Ariary" min="0">
						            	</div>
						            	<div class="mt-2 w-100">
						            		<p class="mb-2">Retire</p>
						            		<input type="number" name="subcarteTelmaForm" class="form-control" placeholder="Ariary" min="0">
						            	</div>
						            	<div class="mt-2 w-100">
						            		<p class="mb-2">Raison</p>
						            		<input type="text" name="raisoncarteTelmaForm" class="form-control" placeholder="Raison" required>
						            	</div>
						            	<div class="mt-4 w-100">
						            		<button class="btn btn-block btn-outline-secondary btn-sm" type="submit" name="carteTelmaFormEsACCP">Entrer</button>
						            	</div>
					            	</form>
				      			</div>
			      			</div>


			      			<div class="small-box bg-danger"  data-toggle="collapse" data-target="#carteAirtelForm">
					            <div class="inner">
					            	<div class="row">
					            		<div class="col-sm-6 text-left">
							                <p class="mb-0 text-uppercase"><img src="../../content/image/airtel.png" width="15" height="15" class="img-responsive mb-1 img-circle"> Airtel : </p>
					            		</div>
					            		<div class="col-sm-6 text-right">
					                		<p class="mb-0"><?= number_format($data[7]['nombre']) ?></p>
					            		</div>
					            	</div>
				      			</div>
			      			</div>
			      			<div class="collapse" id="carteAirtelForm">
				      			<div class="small-box bg-light p-2">
				      				<form method="POST">
			  							<div class="w-100">
						            		<p class="mb-2">Ajout</p>
						            		<input type="number" name="addcarteAirtelForm" class="form-control" placeholder="Ariary" min="0">
						            	</div>
						            	<div class="mt-2 w-100">
						            		<p class="mb-2">Retire</p>
						            		<input type="number" name="subcarteAirtelForm" class="form-control" placeholder="Ariary" min="0">
						            	</div>
						            	<div class="mt-2 w-100">
						            		<p class="mb-2">Raison</p>
						            		<input type="text" name="raisoncarteAirtelForm" class="form-control" placeholder="Raison" required>
						            	</div>
						            	<div class="mt-4 w-100">
						            		<button class="btn btn-block btn-outline-secondary btn-sm" type="submit" name="carteAirtelFormEsACCP">Entrer</button>
						            	</div>
					            	</form>
				      			</div>
			      			</div>


			      			<div class="small-box bg-warning"  data-toggle="collapse" data-target="#carteOrangeForm">
					            <div class="inner">
					            	<div class="row">
					            		<div class="col-sm-6 text-left">
							                <p class="mb-0 text-uppercase"><img src="../../content/image/orange.png" width="15" height="15" class="img-responsive mb-1 img-circle"> Orange : </p>
					            		</div>
					            		<div class="col-sm-6 text-right">
					                		<p class="mb-0"><?= number_format($data[8]['nombre']) ?></p>
					            		</div>
					            	</div>
				      			</div>
			      			</div>
			      			<div class="collapse" id="carteOrangeForm">
				      			<div class="small-box bg-light p-2">
				      				<form method="POST">
			  							<div class="w-100">
						            		<p class="mb-2">Ajout</p>
						            		<input type="number" name="addcarteOrangeForm" class="form-control" placeholder="Ariary" min="0">
						            	</div>
						            	<div class="mt-2 w-100">
						            		<p class="mb-2">Retire</p>
						            		<input type="number" name="subcarteOrangeForm" class="form-control" placeholder="Ariary" min="0">
						            	</div>
						            	<div class="mt-2 w-100">
						            		<p class="mb-2">Raison</p>
						            		<input type="text" name="raisoncarteOrangeForm" class="form-control" placeholder="Raison" required>
						            	</div>
						            	<div class="mt-4 w-100">
						            		<button class="btn btn-block btn-outline-secondary btn-sm" type="submit" name="carteOrangeFormEsACCP">Entrer</button>
						            	</div>
					            	</form>
				      			</div>
			      			</div>

			      			<button class="btn btn-block btn-outline-secondary" data-toggle="modal" data-target="#modalRapport">Rapport journée</button>
			      		</div>
			      	</div>
			      </div>
			      <div class="col-lg-3">
			      	<div class="card h-100">
			      		<div class="card-header">
			                <h3 class="m-0 card-title">Puces (<?= number_format($data[3]["nombre"] + $data[4]["nombre"] +$data[5]["nombre"]) ?>)</h3>
			      		</div>
			      		<div class="card-body">
			      			<div class="small-box bg-success" data-toggle="collapse" data-target="#puceTelmaForm">
					            <div class="inner">
					            	<div class="row">
					            		<div class="col-sm-6 text-left">
							                <p class="mb-0 text-uppercase"><img src="../../content/image/telma.png" width="15" height="15" class="img-responsive mb-1 img-circle"> Telma : </p>
					            		</div>
					            		<div class="col-sm-6 text-right">
					                		<p class="mb-0"><?= number_format($data[3]['nombre']) ?></p>
					            		</div>
					            	</div>
				      			</div>
			      			</div>
			      			<div class="collapse" id="puceTelmaForm">
				      			<div class="small-box bg-light p-2">
				      				<form method="POST">
			  							<div class="w-100">
						            		<p class="mb-2">Ajout</p>
						            		<input type="number" name="addpuceTelmaForm" class="form-control" placeholder="Ariary" min="0">
						            	</div>
						            	<div class="mt-2 w-100">
						            		<p class="mb-2">Retire</p>
						            		<input type="number" name="subpuceTelmaForm" class="form-control" placeholder="Ariary" min="0">
						            	</div>
						            	<div class="mt-2 w-100">
						            		<p class="mb-2">Raison</p>
						            		<input type="text" name="raisonpuceTelmaForm" class="form-control" placeholder="Raison" required>
						            	</div>
						            	<div class="mt-4 w-100">
						            		<button class="btn btn-block btn-outline-secondary btn-sm" type="submit" name="puceTelmaFormEsACCP">Entrer</button>
						            	</div>
					            	</form>
				      			</div>
			      			</div>

			      			<div class="small-box bg-danger" data-toggle="collapse" data-target="#puceAirtelForm">
					            <div class="inner">
					            	<div class="row">
					            		<div class="col-sm-6 text-left">
							                <p class="mb-0 text-uppercase"><img src="../../content/image/airtel.png" width="15" height="15" class="img-responsive mb-1 img-circle"> Airtel : </p>
					            		</div>
					            		<div class="col-sm-6 text-right">
					                		<p class="mb-0"><?= number_format($data[4]['nombre']) ?></p>
					            		</div>
					            	</div>
				      			</div>
			      			</div>
			      			<div class="collapse" id="puceAirtelForm">
				      			<div class="small-box bg-light p-2">
				      				<form method="POST">
			  							<div class="w-100">
						            		<p class="mb-2">Ajout</p>
						            		<input type="number" name="addpuceAirtelForm" class="form-control" placeholder="Ariary" min="0">
						            	</div>
						            	<div class="mt-2 w-100">
						            		<p class="mb-2">Retire</p>
						            		<input type="number" name="subpuceAirtelForm" class="form-control" placeholder="Ariary" min="0">
						            	</div>
						            	<div class="mt-2 w-100">
						            		<p class="mb-2">Raison</p>
						            		<input type="text" name="raisonpuceAirtelForm" class="form-control" placeholder="Raison" required>
						            	</div>
						            	<div class="mt-4 w-100">
						            		<button class="btn btn-block btn-outline-secondary btn-sm" type="submit" name="puceAirtelFormEsACCP">Entrer</button>
						            	</div>
					            	</form>
				      			</div>
			      			</div>

			      			<div class="small-box bg-warning" data-toggle="collapse" data-target="#puceOrangeForm">
					            <div class="inner">
					            	<div class="row">
					            		<div class="col-sm-6 text-left">
							                <p class="mb-0 text-uppercase"><img src="../../content/image/orange.png" width="15" height="15" class="img-responsive mb-1 img-circle"> Orange : </p>
					            		</div>
					            		<div class="col-sm-6 text-right">
					                		<p class="mb-0"><?= number_format($data[5]['nombre']) ?></p>
					            		</div>
					            	</div>
				      			</div>
			      			</div>
			      			<div class="collapse" id="puceOrangeForm">
				      			<div class="small-box bg-light p-2">
				      				<form method="POST">
			  							<div class="w-100">
						            		<p class="mb-2">Ajout</p>
						            		<input type="number" name="addpuceOrangeForm" class="form-control" placeholder="Ariary" min="0">
						            	</div>
						            	<div class="mt-2 w-100">
						            		<p class="mb-2">Retire</p>
						            		<input type="number" name="subpuceOrangeForm" class="form-control" placeholder="Ariary" min="0">
						            	</div>
						            	<div class="mt-2 w-100">
						            		<p class="mb-2">Raison</p>
						            		<input type="text" name="raisonpuceOrangeForm" class="form-control" placeholder="Raison" required>
						            	</div>
						            	<div class="mt-4 w-100">
						            		<button class="btn btn-block btn-outline-secondary btn-sm" type="submit" name="puceOrangeFormEsACCP">Entrer</button>
						            	</div>
					            	</form>
				      			</div>
			      			</div>
			      			<button class="btn btn-block btn-outline-secondary" data-toggle="modal" data-target="#modalRapport">Rapport journée</button>
			      		</div>
			      	</div>
			      </div>
	      	</div>
      	</div>
      	<br>
      	<br>
      	<div class="mt-5">
      		<div class="container-fluid">
	      		<div class="card">
	      			<div class="card-header">
		                <h3 class="m-0 card-title">Transaction</h3>
		                <div class="card-tools">
		                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
		                    <i class="fas fa-minus"></i>
		                  </button>
		                </div>
	      			</div>
	      			<div class="card-body">
	      				<div class="card-body table-responsive p-0">
		      				<table class="table table-hover text-nowrap">
		      					<thead>
				                    <tr>
				                      <th>#</th>
				                      <th>Date</th>
				                      <th>Operateur</th>
				                      <th>Type</th>
				                      <th>Nombre</th>
				                      <th>Vente</th>
				                      <th>Espece</th>
				                      <th>Raison</th>
				                    </tr>
			                  	</thead>
			                  	<tbody>
			                  		<?php 
			                  			foreach ($listeTransaction as $key => $value) {
			                  		?>
					                  		<tr>
				                  			  <td><?= $value['id'] ?></td>
				                  			  <td><?= $value['DateAC'] ?></td>
						                      <td><?= $value['Operateur'] ?></td>
						                      <td><?= $value['Type'] ?></td>
						                      <td><?= $value['Nombre'] ?></td>
						                      <td><?= $value['Vente'] ?></td>
						                      <td><?= $value['Espece'] ?></td>
						                      <td><?= $value['Raison'] ?></td>
						                    </tr>
				                    <?php } ?>
			                  	</tbody>
		      				</table>
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
	<script src="../../content/plugins/sweetalert2/sweetalert2.min.js"></script>
	<script src="../../content/plugins/toastr/toastr.min.js"></script>
	<script src="../../content/js/pages/dashboard.js"></script>
	<script type="text/javascript">
	function ShowMessage(type, message) {
		var Toast = Swal.mixin({
	      toast: true,
	      position: 'top-end',
	      showConfirmButton: false,
	      timer: 3000
	    });
		Toast.fire({
	        icon: type,
	        title: message
	    })
	}
	</script>
	<script src="../../content/js/loader/jquery.min.js"></script> 
    <script src="../../content/js/loader/wow.min.js"></script> 
    <script src="../../content/js/loader/loading.js"></script>
</body>
</html>