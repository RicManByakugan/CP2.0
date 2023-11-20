<?php 
	include 'modele.operateur.php';

	class Transaction
	{
		
		private $bdd;
		private $operateur;
	
		function __construct()
		{
			$this->operateur = new Operateur();
			$co = new Connexion();
			$this->bdd = $co->connectBD();
		}

		public function AddNotificationSolde($operateur, $description, $montant, $raison, $solde ,$espece)
		{
			$sql = "INSERT INTO $operateur(DescriptionSolde,MontantSolde,Solde,Espece,Raison,DateOp,HeureOp) VALUES('$description', $montant, $solde ,$espece, '$raison',NOW(),NOW())";
			$this->bdd->exec($sql);
			return 1;
		}

		public function AddNotificationEspece($operateur, $description, $montant, $raison, $solde ,$espece)
		{
			$sql = "INSERT INTO $operateur(DescriptionEspece,MontantEspece,Solde,Espece,Raison,DateOp,HeureOp) VALUES('$description', $montant, $solde ,$espece, '$raison',NOW(),NOW())";
			$this->bdd->exec($sql);
			return 1;
		}

		public function AddNotificationSoldeEspece($operateur, $descriptionSolde, $montantSolde, $descriptionEspece, $montantEspece, $raison, $solde ,$espece)
		{
			$sql = "INSERT INTO $operateur(DescriptionSolde,MontantSolde,DescriptionEspece,MontantEspece,Solde,Espece,Raison,DateOp,HeureOp) VALUES('$descriptionSolde', $montantSolde,'$descriptionEspece', $montantEspece, $solde ,$espece, '$raison',NOW(),NOW())";
			$this->bdd->exec($sql);
			return 1;
		}

		public function AddNotificationRetrait($operateur, $numero, $montant, $bonus, $newSolde, $newEspece)
		{
			$sql = "INSERT INTO $operateur(Numero,Retrait,Bonus,Solde,Espece,DateOp,HeureOp) VALUES('$numero', $montant, $bonus, $newSolde, $newEspece, NOW(), NOW())";
			$this->bdd->exec($sql);
			return 1;
		}

		public function AddNotificationTransfert($operateur, $position, $numero, $montant, $bonus, $frais, $newSolde, $newEspece)
		{
			$sql = "INSERT INTO $operateur(Position,Numero,Envoie,Frais,Bonus,Solde,Espece,DateOp,HeureOp) VALUES('$position','$numero', $montant, $frais, $bonus, $newSolde, $newEspece, NOW(), NOW())";
			$this->bdd->exec($sql);
			return 1;
		}

		public function GetTransaction($operateur)
		{
			$sql = "SELECT * FROM $operateur ORDER BY idOp DESC";
			$recup = $this->bdd->query($sql);
			$donne = $recup->fetchall();
			return $donne;
		}

		public function GetTransactionToday($operateur)
		{
			$today = date('Y-m-d');
			$sql = "SELECT * FROM $operateur WHERE DateOp='$today' ORDER BY idOp DESC";
			//$sql = "SELECT * FROM $operateur WHERE DateOp='$today' AND Bonus IS NOT NULL ORDER BY idOp DESC";
			$recup = $this->bdd->query($sql);
			$donne = $recup->fetchall();
			return $donne;
		}

		public function GetTransactionTodayCount($operateur)
		{
			$today = date('Y-m-d');
			$sql = "SELECT COUNT(idOp) AS nombre FROM $operateur WHERE DateOp='$today' AND Bonus IS NOT NULL";
			$recup = $this->bdd->query($sql);
			$donne = $recup->fetch();
			return $donne['nombre'];
		}

		public function GetTransactionYesterdayCount($operateur)
		{
			$today = date('Y-m-d');
			$sql = "SELECT COUNT(idOp) AS nombre FROM $operateur WHERE DateOp=DATE_SUB($today, INTERVAL 1 DAY) AND Bonus IS NOT NULL";
			$recup = $this->bdd->query($sql);
			$donne = $recup->fetch();
			return $donne['nombre'];
		}

		public function GetTransactionYesterdayCountTable($operateur)
		{
			$today = date('Y-m-d');
			list($Year, $month, $day) = explode("-", $today);
			$sql = "SELECT * FROM daytransaction WHERE Day=DATE_SUB('$Year-$month-$day', INTERVAL 1 DAY)";
			$recup = $this->bdd->query($sql);
			$donne = $recup->fetch();
			if ($donne) {
				return $donne[$operateur];
			}else{
				return 0;
			}
		}


		public function FinishDay($telma, $airtel, $orange)
		{
			$sql = "INSERT INTO daytransaction(NombreTelma,NombreAirtel,NombreOrange,Day) VALUES($telma, $airtel, $orange, NOW())";
			$this->bdd->exec($sql);
		}
		public function FinishDayVirtual($telma, $airtel, $orange, $dayV)
		{
			$sql = "INSERT INTO daytransaction(NombreTelma,NombreAirtel,NombreOrange,Day) VALUES($telma, $airtel, $orange, '$dayV')";
			$this->bdd->exec($sql);
		}

		public function VerDayF()
		{
			$today = date('Y-m-d');
			$sql = "SELECT * FROM daytransaction WHERE Day='$today'";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetch();
		}


		// TELMA-----------------------------------------------------------------------------
		// ----------------------------------------------------------------------------------
		public function GetBonusRetraitTelma($montant)
		{
			return $this->operateur->GetBonusRetraitTelma($montant);
		}

		public function GetAllThreeEnvoieTelma($position, $montant)
		{
			return $this->operateur->GetAllThreeEnvoieTelma($position, $montant);
		}

		public function GetAllThreeEnvoieTanaTelma($montant)
		{
			return $this->operateur->GetAllThreeEnvoieTanaTelma($montant);
		}

		public function GetAllThreeEnvoieHorsTanaTelma($montant)
		{
			return $this->operateur->GetAllThreeEnvoieHorsTanaTelma($montant);
		}
		// ----------------------------------------------------------------------------------

		// AIRTEL
		// ----------------------------------------------------------------------------------
		public function GetBonusRetraitAirtel($montant)
		{
			return $this->operateur->GetBonusRetraitAirtel($montant);
		}

		public function GetAllThreeEnvoieAirtel($position, $montant)
		{
			return $this->operateur->GetAllThreeEnvoieAirtel($position ,$montant);
		}

		public function GetAllThreeEnvoieTanaAirtel($montant)
		{
			return $this->operateur->GetAllThreeEnvoieTanaAirtel($montant);
		}

		public function GetAllThreeEnvoieHorsTanaAirtel($montant)
		{
			return $this->operateur->GetAllThreeEnvoieHorsTanaAirtel($montant);
		}
		// ----------------------------------------------------------------------------------


		// ORANGE
		// ----------------------------------------------------------------------------------
		public function GetBonusRetraitOrange($montant)
		{
			return $this->operateur->GetBonusRetraitOrange($montant);
		}

		public function GetAllThreeEnvoieOrange($position, $montant)
		{
			return $this->operateur->GetAllThreeEnvoieOrange($position, $montant);
		}

		public function GetAllThreeEnvoieTanaOrange($montant)
		{
			return $this->operateur->GetAllThreeEnvoieTanaOrange($montant);
		}

		public function GetAllThreeEnvoieHorsTanaOrange($montant)
		{
			return $this->operateur->GetAllThreeEnvoieHorsTanaOrange($montant);
		}
		// ----------------------------------------------------------------------------------
		
	}

 ?>