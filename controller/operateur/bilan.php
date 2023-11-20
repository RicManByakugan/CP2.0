<?php 
	include '../../modele/modele.bilan.php';
	include '../../config/connex.php';

	$bilan = new Bilan();
	$data = $bilan->GetData(NULL);


	if (isset($_POST['operateurName'])) {
		$operateur = $_POST['operateurName'];
		$titre = $_POST['titre'];
	}else{
		$operateur = "NombreTelma";
		$titre = "telma";
	}

	if ($titre == "telma") {
		$card = "card-success";	
		$colorOp = "#28a745";
	}elseif ($titre == "airtel") {
		$card = "card-danger";	
		$colorOp = "#dc3545";
	}elseif ($titre == "orange") {
		$card = "card-warning";	
		$colorOp = "#ffc107";
	}else{
		$card = "card-success";	
		$colorOp = "#28a745";
	}


	$transactionJour = $bilan->BoucleData($data, "Day");
	$transactionJourCount = $bilan->BoucleData($data, $operateur);

	$valOne = !empty($transactionJour[0]) ? $transactionJour[0]==date("Y-m-d") ? "Aujourd\'hui" : $transactionJour[0] : "";
	$valTwo = !empty($transactionJour[1]) ? $transactionJour[1]==date("Y-m-d") ? "Aujourd\'hui" : $transactionJour[1] : "";
	$valThree = !empty($transactionJour[2]) ? $transactionJour[2]==date("Y-m-d") ? "Aujourd\'hui" : $transactionJour[2] : "";
	$valFour = !empty($transactionJour[3]) ? $transactionJour[3]==date("Y-m-d") ? "Aujourd\'hui" : $transactionJour[3] : "";
	$valFive = !empty($transactionJour[4]) ? $transactionJour[4]==date("Y-m-d") ? "Aujourd\'hui" : $transactionJour[4] : "";
	$valSix = !empty($transactionJour[5]) ? $transactionJour[5]==date("Y-m-d") ? "Aujourd\'hui" : $transactionJour[5] : "";
	$valSeven = !empty($transactionJour[6]) ? $transactionJour[6]==date("Y-m-d") ? "Aujourd\'hui" : $transactionJour[6] : "";

	$valOneCount = !empty($transactionJourCount[0]) ? $transactionJourCount[0] : "";
	$valTwoCount = !empty($transactionJourCount[1]) ? $transactionJourCount[1] : "";
	$valThreeCount = !empty($transactionJourCount[2]) ? $transactionJourCount[2] : "";
	$valFourCount = !empty($transactionJourCount[3]) ? $transactionJourCount[3] : "";
	$valFiveCount = !empty($transactionJourCount[4]) ? $transactionJourCount[4] : "";
	$valSixCount = !empty($transactionJourCount[5]) ? $transactionJourCount[5] : "";
	$valSevenCount = !empty($transactionJourCount[6]) ? $transactionJourCount[6] : "";

	$semaine = $bilan->GetDataInterval(7, 0, $operateur);
	$semaine2 = $bilan->GetDataInterval(14, 7, $operateur);
	$semaine3 = $bilan->GetDataInterval(21, 14, $operateur);
	$semaine4 = $bilan->GetDataInterval(28, 21, $operateur);


	$semaineTelma = $bilan->GetDataInterval(7, 0, "NombreTelma");
	$semaine2Telma = $bilan->GetDataInterval(14, 7, "NombreTelma");
	$semaine3Telma = $bilan->GetDataInterval(21, 14, "NombreTelma");
	$semaine4Telma = $bilan->GetDataInterval(28, 21, "NombreTelma");

	$semaineAirtel = $bilan->GetDataInterval(7, 0, "NombreAirtel");
	$semaine2Airtel = $bilan->GetDataInterval(14, 7, "NombreAirtel");
	$semaine3Airtel = $bilan->GetDataInterval(21, 14, "NombreAirtel");
	$semaine4Airtel = $bilan->GetDataInterval(28, 21, "NombreAirtel");

	$semaineOrange = $bilan->GetDataInterval(7, 0, "NombreOrange");
	$semaine2Orange = $bilan->GetDataInterval(14, 7, "NombreOrange");
	$semaine3Orange = $bilan->GetDataInterval(21, 14, "NombreOrange");
	$semaine4Orange = $bilan->GetDataInterval(28, 21, "NombreOrange");


	echo "
		<script type=\"text/javascript\">
			
			transactionJour = ['".$valOne."', '".$valTwo."', '".$valThree."', '".$valFour."', '".$valFive."', '".$valSix."', '".$valSeven."']
			transactionJourCount = ['".$valOneCount."', '".$valTwoCount."', '".$valThreeCount."', '".$valFourCount."', '".$valFiveCount."', '".$valSixCount."', '".$valSevenCount."']
			
			couleurOperateur = '".$colorOp."'

			transactionJourArea = ['Avant', 'Avant', 'Avant', 'Semaine']
    		transactionJourCountArea = [".$semaine4.", ".$semaine3.", ".$semaine2.", ".$semaine."]


    		transactionJourCountAreaTelma = [".$semaine4Telma.", ".$semaine3Telma.", ".$semaine2Telma.", ".$semaineTelma."]
    		transactionJourCountAreaAirtel = [".$semaine4Airtel.", ".$semaine3Airtel.", ".$semaine2Airtel.", ".$semaineAirtel."]
    		transactionJourCountAreaOrange = [".$semaine4Orange.", ".$semaine3Orange.", ".$semaine2Orange.", ".$semaineOrange."]

	    </script>
	";
 ?>