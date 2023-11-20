<?php 

	include '../../modele/modele.accp.php';
	include '../../config/connex.php';

	$accp = new ACCP();

	$data = $accp->GetAllACCP();
	$dataEspece = $accp->GetEspece2();
	$listeTransaction = $accp->GetTransaction();

	$verDay1 = $accp->GetTrDayVente("APPEL");
	$verDay2 = $accp->GetTrDayVente("CREDIT");
	$verDay3 = $accp->GetTrDayVente("CARTE");
	$verDay4 = $accp->GetTrDayVente("PUCE");

	if (isset($_POST['EsACCP'])) {
		$addEspeceACCP = $_POST['addEspeceACCP'];
		$subEspeceACCP = $_POST['subEspeceACCP'];
		$raisonAdd = $_POST['raisonACCP'];

		if (empty($addEspeceACCP) && empty($subEspeceACCP)) {
			echo "
				<script type=\"text/javascript\">
			  		alert(\"ERREUR DE TRAITEMENT\")
			  	</script>
			";
		}else{
			if (empty($addEspeceACCP)) {
				$ver = $accp->SubEspece2($subEspeceACCP);
				if ($ver == 0) {
					echo "
						<script type=\"text/javascript\">
					  		alert(\"ESPECE INSUFFISANT\")
					  	</script>
					";
				}else{
					$newEN = $accp->GetEspece2();
					$accp->AddNotification("", "ESPECE", "RETIRE", $subEspeceACCP, $newEN ,$raisonAdd);
					echo "
						<script type=\"text/javascript\">
					  		alert(\"TERMINER\")
					  		location = '../operateur/credit.php';
					  	</script>
					";
				}
			}elseif (empty($subEspeceACCP)) {
				$ver = $accp->AddEspece2($addEspeceACCP);
				if ($ver == 1) {
					$newEN = $accp->GetEspece2();
					$accp->AddNotification("", "ESPECE", "AJOUT", $addEspeceACCP, $newEN ,$raisonAdd);
					echo "
						<script type=\"text/javascript\">
					  		alert(\"TERMINER\")
					  		location = '../operateur/credit.php';
					  	</script>
					";
				}else{
					echo "
						<script type=\"text/javascript\">
					  		alert(\"ERREUR\")
					  	</script>
					";
				}
			}elseif(!empty($soldeTelma) && !empty($addEspece)){
				echo "
					<script type=\"text/javascript\">
				  		alert(\"ERREUR\")
				  	</script>
				";
			}else{
				echo "
					<script type=\"text/javascript\">
				  		alert(\"ERREUR\")
				  	</script>
				";
			}
		}
	}

	// APPEL
	if (isset($_POST['appelTelmaFormEsACCP'])) {
		$addappelTelmaForm = $_POST['addappelTelmaForm'];
		$subappelTelmaForm = $_POST['subappelTelmaForm'];
		// $subappelTelmaForm = NULL;
		$raisonappelTelmaForm = $_POST['raisonappelTelmaForm'];
		echo $accp->ActiviteACCP("ATelma", $addappelTelmaForm, $subappelTelmaForm, $raisonappelTelmaForm, "APPEL", "TELMA");
	}
	if (isset($_POST['appelAirtelFormEsACCP'])) {
		$addappelAirtelForm = $_POST['addappelAirtelForm'];
		$subappelAirtelForm = $_POST['subappelAirtelForm'];
		// $subappelAirtelForm = NULL;
		$raisonappelAirtelForm = $_POST['raisonappelAirtelForm'];
		echo $accp->ActiviteACCP("AAirtel", $addappelAirtelForm, $subappelAirtelForm, $raisonappelAirtelForm, "APPEL", "AIRTEL");
	}
	if (isset($_POST['appelOrangeFormEsACCP'])) {
		$addappelOrangeForm = $_POST['addappelOrangeForm'];
		$subappelOrangeForm = $_POST['subappelOrangeForm'];
		// $subappelOrangeForm = NULL;
		$raisonappelOrangeForm = $_POST['raisonappelOrangeForm'];
		echo $accp->ActiviteACCP("AOrange", $addappelOrangeForm, $subappelOrangeForm, $raisonappelOrangeForm, "APPEL", "ORANGE");
	}

	// CREDIT
	if (isset($_POST['creditTelmaFormEsACCP'])) {
		$addcreditTelmaForm = $_POST['addcreditTelmaForm'];
		$subcreditTelmaForm = $_POST['subcreditTelmaForm'];
		// $subcreditTelmaForm = NULL;
		$raisoncreditTelmaForm = $_POST['raisoncreditTelmaForm'];
		echo $accp->ActiviteACCP("CrTelma", $addcreditTelmaForm, $subcreditTelmaForm, $raisoncreditTelmaForm, "CREDIT", "TELMA");
	}
	if (isset($_POST['creditAirtelFormEsACCP'])) {
		$addcreditAirtelForm = $_POST['addcreditAirtelForm'];
		$subcreditAirtelForm = $_POST['subcreditAirtelForm'];
		// $subcreditAirtelForm = NULL;
		$raisoncreditAirtelForm = $_POST['raisoncreditAirtelForm'];
		echo $accp->ActiviteACCP("CrAirtel", $addcreditAirtelForm, $subcreditAirtelForm, $raisoncreditAirtelForm, "CREDIT", "AIRTEL");
	}
	if (isset($_POST['creditOrangeFormEsACCP'])) {
		$addcreditOrangeForm = $_POST['addcreditOrangeForm'];
		$subcreditOrangeForm = $_POST['subcreditOrangeForm'];
		// $subcreditOrangeForm = NULL;
		$raisoncreditOrangeForm = $_POST['raisoncreditOrangeForm'];
		echo $accp->ActiviteACCP("CrOrange", $addcreditOrangeForm, $subcreditOrangeForm, $raisoncreditOrangeForm, "CREDIT", "ORANGE");
	}

	// CARTE
	if (isset($_POST['carteTelmaFormEsACCP'])) {
		$addcarteTelmaForm = $_POST['addcarteTelmaForm'];
		$subcarteTelmaForm = $_POST['subcarteTelmaForm'];
		// $subcarteTelmaForm = NULL;
		$raisoncarteTelmaForm = $_POST['raisoncarteTelmaForm'];
		echo $accp->ActiviteACCP("CaTelma", $addcarteTelmaForm, $subcarteTelmaForm, $raisoncarteTelmaForm, "CARTE", "TELMA");
	}
	if (isset($_POST['carteAirtelFormEsACCP'])) {
		$addcarteAirtelForm = $_POST['addcarteAirtelForm'];
		$subcarteAirtelForm = $_POST['subcarteAirtelForm'];
		// $subcarteAirtelForm = NULL;
		$raisoncarteAirtelForm = $_POST['raisoncarteAirtelForm'];
		echo $accp->ActiviteACCP("CaAirtel", $addcarteAirtelForm, $subcarteAirtelForm, $raisoncarteAirtelForm, "CARTE", "AIRTEL");
	}
	if (isset($_POST['carteOrangeFormEsACCP'])) {
		$addcarteOrangeForm = $_POST['addcarteOrangeForm'];
		$subcarteOrangeForm = $_POST['subcarteOrangeForm'];
		// $subcarteOrangeForm = NULL;
		$raisoncarteOrangeForm = $_POST['raisoncarteOrangeForm'];
		echo $accp->ActiviteACCP("CaOrange", $addcarteOrangeForm, $subcarteOrangeForm, $raisoncarteOrangeForm, "CARTE", "ORANGE");
	}

	// PUCE
	if (isset($_POST['puceTelmaFormEsACCP'])) {
		$addpuceTelmaForm = $_POST['addpuceTelmaForm'];
		$subpuceTelmaForm = $_POST['subpuceTelmaForm'];
		// $subpuceTelmaForm = NULL;
		$raisonpuceTelmaForm = $_POST['raisonpuceTelmaForm'];
		echo $accp->ActiviteACCP("PTelma", $addpuceTelmaForm, $subpuceTelmaForm, $raisonpuceTelmaForm, "PUCE", "TELMA");
	}
	if (isset($_POST['puceAirtelFormEsACCP'])) {
		$addpuceAirtelForm = $_POST['addpuceAirtelForm'];
		$subpuceAirtelForm = $_POST['subpuceAirtelForm'];
		// $subpuceAirtelForm = NULL;
		$raisonpuceAirtelForm = $_POST['raisonpuceAirtelForm'];
		echo $accp->ActiviteACCP("PAirtel", $addpuceAirtelForm, $subpuceAirtelForm, $raisonpuceAirtelForm, "PUCE", "AIRTEL");
	}
	if (isset($_POST['puceOrangeFormEsACCP'])) {
		$addpuceOrangeForm = $_POST['addpuceOrangeForm'];
		$subpuceOrangeForm = $_POST['subpuceOrangeForm'];
		// $subpuceOrangeForm = NULL;
		$raisonpuceOrangeForm = $_POST['raisonpuceOrangeForm'];
		echo $accp->ActiviteACCP("POrange", $addpuceOrangeForm, $subpuceOrangeForm, $raisonpuceOrangeForm, "PUCE", "ORANGE");
	}

	// DAY
	if (isset($_POST['appelDay'])) {
		$telmaAppelDay = $_POST['telmaAppelDay'];
		$airtelAppelDay = $_POST['airtelAppelDay'];
		$orangeAppelDay = $_POST['orangeAppelDay'];
		if (empty($telmaAppelDay) || empty($airtelAppelDay) || empty($orangeAppelDay)) {
			echo "
				<script type=\"text/javascript\">
			  		alert(\"ERREUR\")
			  	</script>
			";
		}else{
			$res = $accp->ActiviteDayAppel($telmaAppelDay, $airtelAppelDay, $orangeAppelDay, "APPEL", "A");
			if ($res != 0) {
				echo "
					<script type=\"text/javascript\">
				  		alert(\"TERMINER APPEL\")
						location = '../operateur/credit.php';
				  	</script>
				";
			}else{
				echo "
					<script type=\"text/javascript\">
				  		alert(\"ERREUR\")
				  	</script>
				";
			}
		}
	}

	if (isset($_POST['creditDay'])) {
		$telmaCredit = $_POST['telmaCredit'];
		$airtelCredit = $_POST['airtelCredit'];
		$orangeCredit = $_POST['orangeCredit'];
		if (empty($telmaCredit) || empty($airtelCredit) || empty($orangeCredit)) {
			echo "
				<script type=\"text/javascript\">
			  		alert(\"ERREUR\")
			  	</script>
			";
		}else{
			$res = $accp->ActiviteDay($telmaCredit, $airtelCredit, $orangeCredit, "CREDIT", "Cr");
			if ($res != 0) {
				echo "
					<script type=\"text/javascript\">
				  		alert(\"TERMINER CREDIT\")
						location = '../operateur/credit.php';
				  	</script>
				";
			}else{
				echo "
					<script type=\"text/javascript\">
				  		alert(\"ERREUR\")
				  	</script>
				";
			}
		}
	}

	if (isset($_POST['carteDay'])) {
		$telmaCarte = $_POST['telmaCarte'];
		$airtelCarte = $_POST['airtelCarte'];
		$orangeCarte = $_POST['orangeCarte'];
		if (empty($telmaCarte) || empty($airtelCarte) || empty($orangeCarte)) {
			echo "
				<script type=\"text/javascript\">
			  		alert(\"ERREUR\")
			  	</script>
			";
		}else{
			$res = $accp->ActiviteDayCarte($telmaCarte, $airtelCarte, $orangeCarte, "CARTE", "Ca");
			if ($res != 0) {
				echo "
					<script type=\"text/javascript\">
				  		alert(\"TERMINER CARTE\")
						location = '../operateur/credit.php';
				  	</script>
				";
			}else{
				echo "
					<script type=\"text/javascript\">
				  		alert(\"ERREUR\")
				  	</script>
				";
			}
		}
	}

	if (isset($_POST['puceDay'])) {
		$telmaPuce = $_POST['telmaPuce'];
		$airtelPuce = $_POST['airtelPuce'];
		$orangePuce = $_POST['orangePuce'];
		if (empty($telmaPuce) || empty($airtelPuce) || empty($orangePuce)) {
			echo "
				<script type=\"text/javascript\">
			  		alert(\"ERREUR\")
			  	</script>
			";
		}else{
			$res = $accp->ActiviteDayPuce($telmaPuce, $airtelPuce, $orangePuce, "PUCE", "P");
			if ($res != 0) {
				echo "
					<script type=\"text/javascript\">
				  		alert(\"TERMINER PUCE\")
						location = '../operateur/credit.php';
				  	</script>
				";
			}else{
				echo "
					<script type=\"text/javascript\">
				  		alert(\"ERREUR\")
				  	</script>
				";
			}
		}
	}





 ?>