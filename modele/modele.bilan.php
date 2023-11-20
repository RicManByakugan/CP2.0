<?php 
	/**
	 * 
	 */
	class Bilan
	{
		
		private $bdd;
	
		function __construct()
		{
			$co = new Connexion();
			$this->bdd = $co->connectBD();
		}

		public function GetData($specDate)
		{
			$today = date('Y-m-d');
			if ($specDate != NULL) {
				$beforetoday = $specDate;
			}else{
				$beforetoday = $this->GetBeforeWeek(7);
			}

			$sql = "SELECT * FROM daytransaction WHERE Day>='$beforetoday' AND Day<='$today' ORDER BY idDay ASC";
			$recup = $this->bdd->query($sql);
			$donne = $recup->fetchall();
			if ($donne) {
				return $donne;
			}else{
				return 0;
			}
		}

		public function GetDataInterval($nombreBegin,$nombreLimite,$operateur)
		{
			$dayBegin = $this->GetBeforeWeek($nombreBegin);
			if ($nombreLimite == 0) {
				$dayLimite = date('Y-m-d');
			}else{
				$dayLimite = $this->GetBeforeWeek($nombreLimite);
			}

			$sql = "SELECT * FROM daytransaction WHERE Day>='$dayBegin' AND Day<='$dayLimite' ORDER BY idDay ASC";
			$recup = $this->bdd->query($sql);
			$donne = $recup->fetchall();
			if ($donne) {
				$countIt = $this->BoucleDataCount($donne, $operateur);
				return $countIt;
			}else{
				return 0;
			}
		}

		public function BoucleDataCount($data, $operateur)
		{
			$somme = 0;
			foreach ($data as $key => $value) {
				$somme = $somme + $value[$operateur];
			}
			return $somme;
		}

		public function GetBeforeWeek($nombre)
		{
			$beforeWeek = time() - ($nombre * 24 * 60 * 60);
			return date('Y-m-d', $beforeWeek);		
		}

		public function BoucleData($data, $champ)
		{
			$i = 0;
			$donne = array();
			if ($data) {
				foreach ($data as $key => $value) {
					$donne[$i] = $value[$champ];
					$i += 1;
				}
			}else{
				$donne[0] = 0;
			}
			return $donne;
		}
	}

 ?>