<?php 
	/**
	 * 
	 */
	class ACCP
	{
		
		private $bdd;
	
		function __construct()
		{
			$co = new Connexion();
			$this->bdd = $co->connectBD();
		}

		public function GetAllACCP()
		{
			$sql = "SELECT * FROM accp";
			$recup = $this->bdd->query($sql);
			$donne = $recup->fetchall();
			if ($donne) {
				return $donne;
			}else{
				return [];
			}
		}

		public function GetTransaction()
		{
			$sql = "SELECT * FROM accptransaction ORDER BY id DESC";
			$recup = $this->bdd->query($sql);
			$donne = $recup->fetchall();
			if ($donne) {
				return $donne;
			}else{
				return [];
			};
		}

		public function GetEspece2()
		{
			$sqlVer = "SELECT * FROM chiffre WHERE idC=5";
			$recup = $this->bdd->query($sqlVer);
			$donne = $recup->fetch();
			return $donne['soldeC'];
		}

		public function GetTrDayVente($type)
		{
			$today = date('Y-m-d');
			$sqlVer = "SELECT * FROM accptransaction WHERE Raison='VENTE' AND DateAC='$today' AND Type='$type' ORDER BY id ASC";
			$recup = $this->bdd->query($sqlVer);
			$donne = $recup->fetchall();
			if ($donne) {
				return $donne;
			}else{
				return [];
			}
		}

		public function ActiviteACCP($operateur, $adding, $subing, $raison, $typeTr, $operateurNotif)
		{
			if (empty($adding) && empty($subing)) {
				return "
					<script type=\"text/javascript\">
				  		alert(\"AJOUTEZ DES CHIFFRES\")
				  	</script>
				";
			}else{
				if (empty($adding)) {
					$ver = $this->SubChiffre($operateur, $subing);
					if ($ver == 0) {
						$solde = $this->GetChiffre($operateur);
						return "
							<script type=\"text/javascript\">
						  		alert(\"$typeTr $operateurNotif INSUFFISANT : $solde Ar\")
						  	</script>
						";
					}else{
						$this->AddNotification($operateurNotif, $typeTr, "RETIRE", $subing, 0 ,$raison);
						return "
							<script type=\"text/javascript\">
						  		alert(\"$typeTr $operateurNotif : RETIRE TERMINER\")
						  		location = '../operateur/credit.php';
						  	</script>
						";
					}
				}elseif (empty($subing)) {
					$ver = $this->AddChiffre($operateur, $adding);
					if ($ver == 1) {
						$this->AddNotification($operateurNotif, $typeTr, "AJOUT", $adding, 0 ,$raison);
						return "
							<script type=\"text/javascript\">
						  		alert(\"$typeTr $operateurNotif : AJOUT TERMINER\")
						  		location = '../operateur/credit.php';
						  	</script>
						";
					}else{
						return "
							<script type=\"text/javascript\">
						  		alert(\"ERREUR\")
						  	</script>
						";
					}
				}elseif(!empty($adding) && !empty($subing)){
					return "
						<script type=\"text/javascript\">
					  		alert(\"ERREUR\")
					  	</script>
					";
				}else{
					return "
						<script type=\"text/javascript\">
					  		alert(\"ERREUR\")
					  	</script>
					";
				}
			}
		}

		public function ActiviteDayPuce($telma, $airtel, $orange, $type, $tete)
		{
			$verTelma = $this->ReturnVer("Telma", $tete, $telma);
			$verAirtel = $this->ReturnVer("Airtel", $tete, $airtel);
			$verOrange = $this->ReturnVer("Orange", $tete, $orange);
			if ($verTelma == 1 && $verAirtel == 1 && $verOrange == 1 ) {
				$oldVarTelma = $this->GetChiffre($tete."Telma");
				$oldVarAirtel = $this->GetChiffre($tete."Airtel");
				$oldVarOrange = $this->GetChiffre($tete."Orange");
				
				$newValTelma = $oldVarTelma - $telma;
				$newValAirtel = $oldVarAirtel - $airtel;
				$newValOrange = $oldVarOrange - $orange;

			 	$this->AddEspece2($newValTelma*3000);
			 	$this->UpdateChiffre($tete."Telma", $telma);
				$this->AddNotification("TELMA", $type, $newValTelma, $newValTelma*3000, $this->GetEspece2() ,"VENTE");

				$this->AddEspece2($newValAirtel*3000);
			 	$this->UpdateChiffre($tete."Airtel", $airtel);
				$this->AddNotification("AIRTEL", $type, $newValAirtel, $newValAirtel*3000, $this->GetEspece2() ,"VENTE");

				$this->AddEspece2($newValOrange*3000);
			 	$this->UpdateChiffre($tete."Orange", $orange);
				$this->AddNotification("ORANGE", $type, $newValOrange, $newValOrange*3000, $this->GetEspece2() ,"VENTE");

				return 1;
			}else{
				return 0;
			}
		}

		public function ActiviteDayCarte($telma, $airtel, $orange, $type, $tete)
		{
			$verTelma = $this->ReturnVer("Telma", $tete, $telma);
			$verAirtel = $this->ReturnVer("Airtel", $tete, $airtel);
			$verOrange = $this->ReturnVer("Orange", $tete, $orange);
			if ($verTelma == 1 && $verAirtel == 1 && $verOrange == 1 ) {
				$oldVarTelma = $this->GetChiffre($tete."Telma");
				$oldVarAirtel = $this->GetChiffre($tete."Airtel");
				$oldVarOrange = $this->GetChiffre($tete."Orange");
				
				$newValTelma = $oldVarTelma - $telma;
				$newValAirtel = $oldVarAirtel - $airtel;
				$newValOrange = $oldVarOrange - $orange;

			 	$this->AddEspece2($newValTelma*1000);
			 	$this->UpdateChiffre($tete."Telma", $telma);
				$this->AddNotification("TELMA", $type, $newValTelma, $newValTelma*1000, $this->GetEspece2() ,"VENTE");

				$this->AddEspece2($newValAirtel*1000);
			 	$this->UpdateChiffre($tete."Airtel", $airtel);
				$this->AddNotification("AIRTEL", $type, $newValAirtel, $newValAirtel*1000, $this->GetEspece2() ,"VENTE");

				$this->AddEspece2($newValOrange*1000);
			 	$this->UpdateChiffre($tete."Orange", $orange);
				$this->AddNotification("ORANGE", $type, $newValOrange, $newValOrange*1000, $this->GetEspece2() ,"VENTE");

				return 1;
			}else{
				return 0;
			}
		}

		public function ActiviteDay($telma, $airtel, $orange, $type, $tete)
		{
			$verTelma = $this->ReturnVer("Telma", $tete, $telma);
			$verAirtel = $this->ReturnVer("Airtel", $tete, $airtel);
			$verOrange = $this->ReturnVer("Orange", $tete, $orange);
			if ($verTelma == 1 && $verAirtel == 1 && $verOrange == 1 ) {
				$oldVarTelma = $this->GetChiffre($tete."Telma");
				$oldVarAirtel = $this->GetChiffre($tete."Airtel");
				$oldVarOrange = $this->GetChiffre($tete."Orange");
				
				$newValTelma = $oldVarTelma - $telma;
				$newValAirtel = $oldVarAirtel - $airtel;
				$newValOrange = $oldVarOrange - $orange;

			 	$this->AddEspece2($newValTelma);
			 	$this->UpdateChiffre($tete."Telma", $telma);
				$this->AddNotification("TELMA", $type, "", $newValTelma, $this->GetEspece2() ,"VENTE");

				$this->AddEspece2($newValAirtel);
			 	$this->UpdateChiffre($tete."Airtel", $airtel);
				$this->AddNotification("AIRTEL", $type, "", $newValAirtel, $this->GetEspece2() ,"VENTE");

				$this->AddEspece2($newValOrange);
			 	$this->UpdateChiffre($tete."Orange", $orange);
				$this->AddNotification("ORANGE", $type, "", $newValOrange, $this->GetEspece2() ,"VENTE");

				return 1;
			}else{
				return 0;
			}
		}

		public function ActiviteDayAppel($telma, $airtel, $orange, $type, $tete)
		{
			$verTelma = $this->ReturnVer("Telma", $tete, $telma);
			$verAirtel = $this->ReturnVer("Airtel", $tete, $airtel);
			$verOrange = $this->ReturnVer("Orange", $tete, $orange);
			if ($verTelma == 1 && $verAirtel == 1 && $verOrange == 1 ) {
				$oldVarTelma = $this->GetChiffre($tete."Telma");
				$oldVarAirtel = $this->GetChiffre($tete."Airtel");
				$oldVarOrange = $this->GetChiffre($tete."Orange");
				
				$newValTelma = (($oldVarTelma - $telma)/40)*100;
				$newValAirtel = (($oldVarAirtel - $airtel)/40)*100;
				$newValOrange = (($oldVarOrange - $orange)/40)*100;

			 	$this->AddEspece2($newValTelma);
			 	$this->UpdateChiffre($tete."Telma", $telma);
				$this->AddNotification("TELMA", $type, "", $newValTelma, $this->GetEspece2() ,"VENTE");

				$this->AddEspece2($newValAirtel);
			 	$this->UpdateChiffre($tete."Airtel", $airtel);
				$this->AddNotification("AIRTEL", $type, "", $newValAirtel, $this->GetEspece2() ,"VENTE");

				$this->AddEspece2($newValOrange);
			 	$this->UpdateChiffre($tete."Orange", $orange);
				$this->AddNotification("ORANGE", $type, "", $newValOrange, $this->GetEspece2() ,"VENTE");

				return 1;
			}else{
				return 0;
			}
		}

		public function ReturnVer($operateur, $tete, $nombre)
		{
			$oldVar = $this->GetChiffre($tete.$operateur);
			if ($nombre <= $oldVar) {
				return 1;
			}else{
				return 0;
			}
		}

		public function AddEspece2($montant)
		{
			$ver = $this->GetEspece2();
			$newS = $ver + $montant;
			$this->UpdateEspece2($newS);
			return 1;
		}

		public function SubEspece2($montant)
		{
			$ver = $this->GetEspece2();
			$newS = $ver - $montant;
			if ($newS <= 0) {
				return 0;
			}else{
				$this->UpdateEspece2($newS);
				return 1;
			}
		}

		public function UpdateEspece2($newS)
		{
			$sql = "UPDATE chiffre SET soldeC=$newS WHERE idC=5"; 
			$this->bdd->exec($sql);
		}

		public function UpdateChiffre($champs, $newS)
		{
			$sql = "UPDATE accp SET nombre=$newS WHERE nom='$champs'"; 
			$this->bdd->exec($sql);
		}

		public function SubChiffre($nom, $montant)
		{
			$ver = $this->GetChiffre($nom);
			$newS = $ver - $montant;
			if ($newS <= 0) {
				return 0;
			}else{
				$this->UpdateChiffre($nom, $newS);
				return 1;
			}
		}

		public function AddChiffre($nom, $montant)
		{
			$ver = $this->GetChiffre($nom);
			$newS = $ver + $montant;
			$this->UpdateChiffre($nom, $newS);
			return 1;
		}

		public function GetChiffre($nom)
		{
			$sqlVer = "SELECT * FROM accp WHERE nom='$nom'";
			$recup = $this->bdd->query($sqlVer);
			$donne = $recup->fetch();
			return $donne['nombre'];
		}

		public function AddNotification($operateur, $type, $description, $nombreMontant, $espece ,$raison)
		{
			$sql = "INSERT INTO accptransaction(Operateur,Type,Nombre,Vente,Espece,Raison,DateAC,HeureAC) VALUES('$operateur', '$type', '$description', '$nombreMontant', $espece ,'$raison',NOW(),NOW())";
			$this->bdd->exec($sql);
			return 1;
		}

	}

 ?>