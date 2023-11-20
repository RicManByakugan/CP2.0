<?php 
	include '../../modele/modele.chiffre.php';
	include '../../modele/modele.transaction.php';
	include '../../config/connex.php';

	$chiffre = new ChiffreTable();
	$transaction = new Transaction();
	$urlOpController = "../operateur/orange.php";
	$regex = '#^032[0-9]{7}$#';
	$operateurController = "orange";
	$idOpController = 3;

	$soldeOrangeAffiche = $chiffre->GetSolde($idOpController);
	$EspeceSoldeAffiche = $chiffre->GetEspece();

	$listeTransaction = $transaction->GetTransaction($operateurController);
	$VerD = $transaction->VerDayF();

	$countTransactionYesterday = $transaction->GetTransactionYesterdayCountTable("NombreOrange");
	// $countTransactionYesterday = $transaction->GetTransactionYesterdayCount($operateurController);
	$countTransactionToday = $transaction->GetTransactionTodayCount($operateurController);
	$diffCount = $countTransactionToday - $countTransactionYesterday;

	$resHierToday = "
		 	<li class='nav-item'>
		        <a class='nav-link'>
		          Hier
		          <span class='float-right text-warning'>
		            ".$countTransactionYesterday."
		            <i class='fas fa-users text-sm mb-0'></i>
		          </span>
		        </a>
	      	</li>
	      	<li class='nav-item'>
		        <a class='nav-link'>
		          Aujourd'hui
		          <span class='float-right text-warning'>
		            ".$countTransactionToday."
		            <i class='fas fa-users text-sm mb-0'></i>
		          </span>
		        </a>
	      	</li>
	 ";

	if ($countTransactionYesterday < $countTransactionToday) {
		$iconCount = "<i class='fas fa-chevron-circle-up'></i>";
		$bgCount = "bg-success";
	}elseif ($countTransactionYesterday == $countTransactionToday) {
		$iconCount = "<i class='fas fa-chevron-circle-right'></i>";
		$bgCount = "bg-warning";
	}else{
		$iconCount = "<i class='fas fa-chevron-circle-down'></i>";
		$bgCount = "bg-danger";
	}
	$difRes = $diffCount > 0 ? "+".$diffCount : $diffCount;
	$diffCountAffiche = "
			<span class='info-box-icon ".$bgCount." elevation-1'>
				".$iconCount."
			</span>

          	<div class='info-box-content text-center'>
                <span class='info-box-text'>Rapport</span>
                <span class='info-box-number'>
                  ".$difRes." <i class='fas fa-users'></i>
                </span>
          	</div>
	";

	if (isset($_POST['addingSomething'])) {
		$soldeOrange = $_POST['addSoldeOrange'];
		$addEspece = $_POST['addEspece'];
		$raisonAdd = $_POST['raisonAdd'];
		if (empty($soldeOrange) && empty($addEspece)) {
			echo "
				<script type=\"text/javascript\">
			  		alert(\"ERREUR DE TRAITEMENT\")
			  	</script>
			";
		}else{
			if (empty($soldeOrange)) {
				$ver = $chiffre->AddEspece($addEspece);
				if ($ver == 1) {
					$newSN = $chiffre->GetSolde($idOpController);
					$newEN = $chiffre->GetEspece();
					$transaction->AddNotificationEspece($operateurController, "AJOUT ESPECE", $addEspece, $raisonAdd, $newSN, $newEN);
					echo "
						<script type=\"text/javascript\">
					  		alert(\"TERMINER\")
					  		location = '".$urlOpController."';
					  	</script>
					";
				}else{
					echo "
						<script type=\"text/javascript\">
					  		alert(\"ERREUR\")
					  	</script>
					";
				}
			}elseif (empty($addEspece)) {
				$ver = $chiffre->AddSolde($idOpController,$soldeOrange);
				if ($ver == 1) {
					$newSN = $chiffre->GetSolde($idOpController);
					$newEN = $chiffre->GetEspece();
					$transaction->AddNotificationSolde($operateurController, "AJOUT SOLDE", $soldeOrange, $raisonAdd, $newSN, $newEN);
					echo "
						<script type=\"text/javascript\">
					  		alert(\"TERMINER\")
					  		location = '".$urlOpController."';
					  	</script>
					";
				}else{
					echo "
						<script type=\"text/javascript\">
					  		alert(\"ERREUR\")
					  	</script>
					";
				}
			}elseif(!empty($soldeOrange) && !empty($addEspece)){
				$verOne = $chiffre->AddEspece($addEspece);
				$verTwo = $chiffre->AddSolde($idOpController,$soldeOrange);

				if ($verOne == 1 && $verTwo == 1) {
					$newSN = $chiffre->GetSolde($idOpController);
					$newEN = $chiffre->GetEspece();
					$transaction->AddNotificationSoldeEspece($operateurController, "AJOUT SOLDE", $soldeOrange, "AJOUT ESPECE", $addEspece, $raisonAdd, $newSN, $newEN);
					echo "
						<script type=\"text/javascript\">
					  		alert(\"TERMINER\")
					  		location = '".$urlOpController."';
					  	</script>
					";
				}else{
					echo "
						<script type=\"text/javascript\">
					  		alert(\"ERREUR\")
					  	</script>
					";
				}
			}else{
				echo "
					<script type=\"text/javascript\">
				  		alert(\"ERREUR\")
				  	</script>
				";
			}
		}
	}

	if (isset($_POST['subingSomething'])) {
		$subSoldeOrange = $_POST['subSoldeOrange'];
		$subEspece = $_POST['subEspece'];
		$raisonSub = $_POST['raisonSub'];
		if (empty($subSoldeOrange) && empty($subEspece)) {
			echo "
				<script type=\"text/javascript\">
			  		alert(\"ERREUR\")
			  	</script>
			";
		}else{
			if (empty($subEspece)) {
				$ver = $chiffre->SubSolde($idOpController, $subSoldeOrange);
				if ($ver == 0) {
					echo "
						<script type=\"text/javascript\">
					  		alert(\"SOLDE INSUFFISANT\")
					  	</script>
					";
				}else{
					$newSN = $chiffre->GetSolde($idOpController);
					$newEN = $chiffre->GetEspece();
					$transaction->AddNotificationSolde($operateurController, "RETIRE SOLDE", $subSoldeOrange, $raisonSub, $newSN, $newEN);
					echo "
						<script type=\"text/javascript\">
					  		alert(\"TERMINER\")
					  		location = '".$urlOpController."';
					  	</script>
					";
				}
			}elseif (empty($subSoldeOrange)) {
				$ver = $chiffre->SubEspece($subEspece);
				if ($ver == 0) {
					echo "
						<script type=\"text/javascript\">
					  		alert(\"ESPECE INSUFFISANT\")
					  	</script>
					";
				}else{
					$newSN = $chiffre->GetSolde($idOpController);
					$newEN = $chiffre->GetEspece();
					$transaction->AddNotificationEspece($operateurController, "RETIRE ESPECE", $subEspece, $raisonSub, $newSN, $newEN);
					echo "
						<script type=\"text/javascript\">
					  		alert(\"TERMINER\")
					  		location = '".$urlOpController."';
					  	</script>
					";
				}
			}elseif(!empty($subSoldeOrange) && !empty($subEspece)){
				$verOne = $chiffre->SubSolde($idOpController, $subSoldeOrange);
				$verTwo = $chiffre->SubEspece($subEspece);
				if ($verOne == 1 && $verTwo != 0) {
					$newSN = $chiffre->GetSolde($idOpController);
					$newEN = $chiffre->GetEspece();
					$transaction->AddNotificationSoldeEspece($operateurController, "RETIRE SOLDE", $subSoldeOrange, "RETIRE ESPECE", $subEspece, $raisonSub, $newSN, $newEN);
					echo "
						<script type=\"text/javascript\">
					  		alert(\"TERMINER\")
					  		location = '".$urlOpController."';
					  	</script>
					";
				}else{
					echo "
						<script type=\"text/javascript\">
					  		alert(\"ERREUR\")
					  	</script>
					";
				}
			}else{
				echo "
					<script type=\"text/javascript\">
				  		alert(\"ERREUR\")
				  	</script>
				";
			}
		}
	}

	if (isset($_POST['retraitArgent'])) {
		$retraitTNumero = $_POST['retraitTNumero'];
		$retraitTMontant = $_POST['retraitTMontant'];

		$verificationNumero = preg_match($regex, $retraitTNumero);
		if ($verificationNumero) {
			$bonus = $transaction->GetBonusRetraitOrange($retraitTMontant);
			if ($bonus != "Invalide") {
				$newSolde = $soldeOrangeAffiche + $retraitTMontant + $bonus;
				$newEspece = $EspeceSoldeAffiche - $retraitTMontant;
				if ($newEspece < 0) {
					echo "
						<script type='text/javascript'>
							alert('ESPECE INSUFFISANTE');
							location = '".$urlOpController."';
						</script>
					";
				}else{
					$res = $chiffre->UpdateSoldeEspece($idOpController, $newSolde, $newEspece);
					if ($res == 1) {
						$done = $transaction->AddNotificationRetrait($operateurController, $retraitTNumero, $retraitTMontant, $bonus, $newSolde, $newEspece);
						if ($done == 1) {
							echo "
								<script type='text/javascript'>
									alert('RETRAIT EFFECTUER ".$retraitTNumero." = ".$retraitTMontant." Ar');
									location = '".$urlOpController."';
								</script> 	";
						}
					}else{
						echo "
							<script type=\"text/javascript\">
						  		alert(\"ERREUR\")
						  	</script>
						";
					}
				}
			}
		}else{
			echo "
				<script type='text/javascript'>
					alert('NUMERO INCORRECT : ".$retraitTNumero."');
					location = '".$urlOpController."';
				</script>
			";
		}
	}

	if (isset($_POST['sendMoney'])) {
		$sendTNumero = $_POST['sendTNumero'];
		$sendTMontant = $_POST['sendTMontant'];
		$sendTPosition = $_POST['sendTPosition'];

		$verificationNumero = preg_match($regex, $sendTNumero);
		if ($verificationNumero) {
			$donneAllN = $transaction->GetAllThreeEnvoieOrange($sendTPosition, $sendTMontant);
			if ($donneAllN['frais'] != "Invalide" OR $donneAllN['bonus'] != "Invalide" OR $donneAllN['frais_retire'] != "Invalide") {
				$newSolde = $soldeOrangeAffiche - $sendTMontant + $donneAllN['bonus'] - $donneAllN['frais_retire'];
				$newEspece = $EspeceSoldeAffiche + $sendTMontant + $donneAllN['frais'];
				if ($newSolde < 0) {
					echo "
						<script type='text/javascript'>
							alert('SOLDE INSUFFISANT : ".$soldeOrangeAffiche." Ar');
							location = '".$urlOpController."';
						</script> 	";
				}else{
					$res = $chiffre->UpdateSoldeEspece($idOpController, $newSolde, $newEspece);
					if ($res == 1) {
						$done = $transaction->AddNotificationTransfert($operateurController, $sendTPosition, $sendTNumero, $sendTMontant, $donneAllN['bonus'], $donneAllN['frais'], $newSolde, $newEspece);
						if ($done == 1) {
							echo "
								<script type='text/javascript'>
									alert('TRANSFERT EFFECTUER ".$sendTNumero." = ".$sendTMontant." Ar');
									location = '".$urlOpController."';
								</script> 	";
						}

					}else{
						echo "
							<script type=\"text/javascript\">
						  		alert(\"ERREUR\")
						  	</script>
						";
					}
				}
			}

		}else{
			echo "
				<script type='text/javascript'>
					alert('NUMERO INCORRECT : ".$sendTNumero."');
					location = '".$urlOpController."';
				</script>
			";
		}
	}

	if (isset($_POST['todayListe'])) {
		$listeTransaction = $transaction->GetTransactionToday($operateurController);
	}

	if (isset($_POST['finishDay'])) {
		$todayFinishTelma = $transaction->GetTransactionTodayCount("telma");
		$todayFinishAirtel = $transaction->GetTransactionTodayCount("airtel");
		$todayFinishOrange = $transaction->GetTransactionTodayCount("orange");
		$transaction->FinishDay($todayFinishTelma,$todayFinishAirtel,$todayFinishOrange);
		echo "
			<script type=\"text/javascript\">
		  		alert(\"A DEMAIN\")
		  		location = '".$urlOpController."';
		  	</script>
		";
	}



?>