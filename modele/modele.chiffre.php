<?php 
	
	class ChiffreTable
	{
		
		private $bdd;
	
		function __construct()
		{
			$co = new Connexion();
			$this->bdd = $co->connectBD();
		}

		public function GetEspece()
		{
			$sqlVer = "SELECT * FROM chiffre WHERE idC=1";
			$recup = $this->bdd->query($sqlVer);
			$donne = $recup->fetch();
			return $donne['soldeC'];
		}


		public function GetSolde($operateur)
		{
			$sqlVer = "SELECT * FROM chiffre WHERE idC=$operateur";
			$recup = $this->bdd->query($sqlVer);
			$donne = $recup->fetch();
			return $donne['soldeC'];
		}

		public function AddEspece($montant)
		{
			$ver = $this->GetEspece();
			$newS = $ver + $montant;
			$this->UpdateEspece($newS);
			return 1;
		}

		public function SubEspece($montant)
		{
			$ver = $this->GetEspece();
			$newS = $ver - $montant;
			if ($newS <= 0) {
				return 0;
			}else{
				$this->UpdateEspece($newS);
				return 1;
			}
		}

		public function AddSolde($operateur, $montant)
		{
			$ver = $this->GetSolde($operateur);
			$newS = $ver + $montant;
			$this->UpdateSolde($operateur,$newS);
			return 1;
		}

		public function SubSolde($operateur, $montant)
		{
			$ver = $this->GetSolde($operateur);
			$newS = $ver - $montant;
			if ($newS <= 0) {
				return 0;
			}else{
				$this->UpdateSolde($operateur,$newS);
				return 1;
			}
		}

		public function UpdateSolde($operateur,$newS)
		{
			$sql = "UPDATE chiffre SET soldeC=$newS WHERE idC=$operateur"; 
			$this->bdd->exec($sql);
		}
		public function UpdateEspece($newS)
		{
			$sql = "UPDATE chiffre SET soldeC=$newS WHERE idC=1"; 
			$this->bdd->exec($sql);
		}

		public function UpdateSoldeEspece($operateur,$solde, $espece)
		{
			$this->UpdateSolde($operateur,$solde);
			$this->UpdateEspece($espece);
			return 1;
		}


	}
	
 ?>