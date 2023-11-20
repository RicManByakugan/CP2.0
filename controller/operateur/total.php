<?php 

	include '../../modele/modele.accp.php';
	include '../../modele/modele.chiffre.php';
	include '../../config/connex.php';

	$accp = new ACCP();
	$chiffre = new ChiffreTable();

	$dataAccp = $accp->GetAllACCP();
	
	$dataEspece1 = $chiffre->GetEspece();
	$dataEspece2 = $accp->GetEspece2();

	$soldeTelma = $chiffre->GetSolde(2);
	$soldeOrange = $chiffre->GetSolde(3);
	$soldeAirtel = $chiffre->GetSolde(4);

 ?>