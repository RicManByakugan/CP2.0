<?php 
	include 'modele/modele.transaction.php';
	include 'config/connex.php';
	$transaction = new Transaction();

	for ($i=1; $i < 32; $i++) { 
		$transaction->FinishDayVirtual(rand(0,50),rand(0,50),rand(0,50),'2022-11-'.$i);
	}

	// echo GetBeforeWeek();
?>