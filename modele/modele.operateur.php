<?php 
		

	/**
	 * 
	 */
	class Operateur
	{
		
		// TELMA TRANSACTION -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		public function GetBonusRetraitTelma($montant)
		{
			switch ($montant) {
				case $montant<=1000:
					$bonus = 42;
				break;
				case 1000<$montant AND $montant<=5000:
					$bonus = 58;
				break;
				case 5000<$montant AND $montant<=10000:
					$bonus = 83;
				break;
				case 10000<$montant AND $montant<=25000:
					$bonus = 250;
				break;
				case 25000<$montant AND $montant<=50000:
					$bonus = 500;
				break;
				case 50000<$montant AND $montant<=100000:
					$bonus = 1000;
				break;
				case 100000<$montant AND $montant<=250000:
					$bonus = 1667;
				break;
				case 250000<$montant AND $montant<=500000:
					$bonus = 2083;
				break;
				case 500000<$montant AND $montant<=1000000:
					$bonus = 2500;
				break;
				// case 1000000<$montant AND $montant<=2000000:
				// 	$bonus = 1500;
				// break;
				default:
					$bonus = "Invalide";
				break;
			}
			return $bonus;
		}

		public function GetAllThreeEnvoieTelma($position, $montant)
		{
			if ($position == "TANA") {
				$res = $this->GetAllThreeEnvoieTanaTelma($montant);

			}else{
				$res = $this->GetAllThreeEnvoieHorsTanaTelma($montant);
			}
			return $res;
		}

		public function GetAllThreeEnvoieTanaTelma($montant)
		{
			switch ($montant) {
				case 300<$montant AND $montant<=5000:
					$frais = 100;
					$bonus = 67;
				break;
				case 5200:
					$frais = 100;
					$bonus = 142;
				break;
				case 5000<$montant AND $montant<=10000:
					$frais = 200;
					$bonus = 142;
				break;
				case 10300:
					$frais = 200;
					$bonus = 208;
				break;
				case 10000<$montant AND $montant<=25000:
					$frais = 400;
					$bonus = 208;
				break;
				case 25600:
					$frais = 400;
					$bonus = 292;
				break;
				case 25000<$montant AND $montant<=50000:
					$frais = 400;
					$bonus = 292;
				break;
				case 51400:
					$frais = 400;
					$bonus = 333;
				break;
				case 50000<$montant AND $montant<=100000:
					$frais = 800;
					$bonus = 333;
				break;
				case 101900:
					$frais = 800;
					$bonus = 667;
				break;
				case 100000<$montant AND $montant<=250000:
					$frais = 1500;
					$bonus = 667;
				break;
				case 253400:
					$frais = 1500;
					$bonus = 667;
				break;
				case 250000<$montant AND $montant<=500000:
					$frais = 2800;
					$bonus = 667;
				break;
				case 504700;
					$frais = 2800;
					$bonus = 917;
				break;
				case 500000<$montant AND $montant<=1000000:
					$frais = 4000;
					$bonus = 917;
				break;
				// case 1000000<$montant AND $montant<=2000000:
				// 	$frais = 5000;
				// 	$bonus = 1500;
				// break;
				// case 2015000:
				// 	$frais = 5000;
				// 	$bonus = 1500;
				// break;
				default:
					$frais = "Invalide";
					$bonus = "Invalide";
				break;
			}
			$donne["bonus"] = $bonus;
			$donne["frais"] = $frais;
			$donne["frais_retire"] = 0;
			return $donne;
		}

		public function GetAllThreeEnvoieHorsTanaTelma($montant)
		{
			switch ($montant) {
				case 300<$montant AND $montant<=5000:
					$frais = 200;
					$frais_retire = 50;
					$bonus = 67;
				break;
				case 5200:
					$frais = 200;
					$frais_retire = 50;
					$bonus = 142;
				break;
				case 5000<$montant AND $montant<=10000:
					$frais = 300;
					$frais_retire = 100;
					$bonus = 142;
				break;
				case 10300:
					$frais = 400;
					$frais_retire = 200;
					$bonus = 208;
				break;
				case 10000<$montant AND $montant<=25000:
					$frais = 600;
					$frais_retire = 200;
					$bonus = 208;
				break;
				case 25600:
					$frais = 800;
					$frais_retire = 400;
					$bonus = 292;
				break;
				case 25000<$montant AND $montant<=50000:
					$frais = 800;
					$frais_retire = 400;
					$bonus = 292;
				break;
				case 51400:
					$frais = 1300;
					$frais_retire = 800;
					$bonus = 333;
				break;
				case 50000<$montant AND $montant<=100000:
					$frais = 1600;
					$frais_retire = 800;
					$bonus = 333;
				break;
				case 101900:
					$frais = 2300;
					$frais_retire = 1500;
					$bonus = 667;
				break;
				case 100000<$montant AND $montant<=250000:
					$frais = 3000;
					$frais_retire = 1500;
					$bonus = 667;
				break;
				case 253400:
					$frais = 3000;
					$frais_retire = 1500;
					$bonus = 667;
				break;
				case 250000<$montant AND $montant<=500000:
					$frais = 4300;
					$frais_retire = 1500;
					$bonus = 667;
				break;
				case 504700;
					$frais = 5300;
					$frais_retire = 2500;
					$bonus = 917;
				break;
				case 500000<$montant AND $montant<=1000000:
					$frais = 6500;
					$frais_retire = 2500;
					$bonus = 917;
				break;
				// case 1009000:
				// 	$frais = 4000;
				// 	$bonus = 1400;
				// break;
				// case 1000000<$montant AND $montant<=2000000:
				// 	$frais = 5000;
				// 	$bonus = 1500;
				// break;
				// case 2015000:
				// 	$frais = 5000;
				// 	$bonus = 1500;
				// break;
				default:
					$frais = "Invalide";
					$bonus = "Invalide";
				break;
			}
			$donne["bonus"] = $bonus;
			$donne["frais"] = $frais;
			$donne["frais_retire"] = $frais_retire;
			return $donne;
		}

		// TELMA TRANSACTION --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------


		// AIRTEL TRANSACTION --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		public function GetBonusRetraitAirtel($montant)
		{
			switch ($montant) {
				case 300<$montant AND $montant<=5000:
					$bonus = 50;
				break;
				case 5000<$montant AND $montant<=10000:
					$bonus = 83.33;
				break;
				case 10000<$montant AND $montant<=20000:
					$bonus = 250;
				break;
				case 20000<$montant AND $montant<=30000:
					$bonus = 279.17;
				break;
				case 30000<$montant AND $montant<=40000:
					$bonus = 458.33;
				break;
				case 40000<$montant AND $montant<=50000:
					$bonus = 583.33;
				break;
				case 50000<$montant AND $montant<=60000:
					$bonus = 583.33;
				break;
				case 60000<$montant AND $montant<=100000:
					$bonus = 916;
				break;
				case 100000<$montant AND $montant<=250000:
					$bonus = 1583.33;
				break;
				case 250000<$montant AND $montant<=500000:
					$bonus = 2083.33;
				break;
				case 500000<$montant AND $montant<=1000000:
					$bonus = 2500;
				break;
				default:
					$bonus = "Invalide";
				break;
			}
			return $bonus;
		}

		public function GetAllThreeEnvoieAirtel($position, $montant)
		{
			if ($position == "TANA") {
				$res = $this->GetAllThreeEnvoieTanaAirtel($montant);

			}else{
				$res = $this->GetAllThreeEnvoieHorsTanaAirtel($montant);
			}
			return $res;
		}

		public function GetAllThreeEnvoieTanaAirtel($montant)
		{
			switch ($montant) {
				case 300<$montant AND $montant<=5150:
					$frais = 100;
					$bonus = 50;
				break;
				case 5150<$montant AND $montant<=10000:
					$frais = 200;
					$bonus = 141;
				break;
				case 10300:
					$frais = 200;
					$bonus = 208.33;
				break;
				case 10000<$montant AND $montant<=20000:
					$frais = 400;
					$bonus = 208.33;
				break;
				case 20000<$montant AND $montant<=30000:
					$frais = 400;
					$bonus = 229.17;
				break;
				case 30000<$montant AND $montant<=40000:
					$frais = 400;
					$bonus = 291;
				break;
				case 40000<$montant AND $montant<=50000:
					$frais = 400;
					$bonus = 333.33;
				break;
				case 51400:
					$frais = 400;
					$bonus = 333.33;
				break;
				case 50000<$montant AND $montant<=60000:
					$frais = 800;
					$bonus = 333.33;
				break;
				case 60000<$montant AND $montant<=100000:
					$frais = 800;
					$bonus = 333.33;
				break;
				case 101900:
					$frais = 800;
					$bonus = 666;
				break;
				case 100000<$montant AND $montant<=250000:
					$frais = 1500;
					$bonus = 666;
				break;
				case 253400:
					$frais = 1500;
					$bonus = 666;
				break;
				case 250000<$montant AND $montant<=500000:
					$frais = 2800;
					$bonus = 666;
				break;
				case 504700;
					$frais = 2800;
					$bonus = 916;
				break;
				case 500000<$montant AND $montant<=1000000:
					$frais = 4000;
					$bonus = 916;
				break;
				// case 1000000<$montant AND $montant<=2000000:
				// 	$frais = 5000;
				// 	$bonus = 1500;
				// break;
				// case 2015000:
				// 	$frais = 5000;
				// 	$bonus = 1500;
				// break;
				default:
					$frais = "Invalide";
					$bonus = "Invalide";
				break;
			}
			$donne["bonus"] = $bonus;
			$donne["frais"] = $frais;
			$donne["frais_retire"] = 0;
			return $donne;
		}

		public function GetAllThreeEnvoieHorsTanaAirtel($montant)
		{
			switch ($montant) {
				case 300<$montant AND $montant<=5000:
					$frais = 200;
					$frais_retire = 50;
					$bonus = 50;
				break;
				case 5150:
					$frais = 200;
					$frais_retire = 100;
					$bonus = 50;
				break;
				case 5000<$montant AND $montant<=10000:
					$frais = 300;
					$frais_retire = 100;
					$bonus = 141;
				break;
				case 10300:
					$frais = 400;
					$frais_retire = 200;
					$bonus = 208.33;
				break;
				case 10000<$montant AND $montant<=20000:
					$frais = 600;
					$frais_retire = 200;
					$bonus = 208.33;
				break;
				case 20000<$montant AND $montant<=25000:
					$frais = 600;
					$frais_retire = 300;
					$bonus = 229.17;
				break;
				case 25600:
					$frais = 600;
					$frais_retire = 300;
					$bonus = 229.17;
				break;
				case 25000<$montant AND $montant<=30000:
					$frais = 800;
					$frais_retire = 300;
					$bonus = 229.17;
				break;
				case 31400:
					$frais = 800;
					$frais_retire = 400;
					$bonus = 291;
				break;
				case 30000<$montant AND $montant<=40000:
					$frais = 800;
					$frais_retire = 400;
					$bonus = 291;
				break;
				case 41400:
					$frais = 800;
					$frais_retire = 600;
					$bonus = 333;
				break;
				case 40000<$montant AND $montant<=50000:
					$frais = 800;
					$frais_retire = 600;
					$bonus = 333.33;
				break;
				case 51400:
					$frais = 1300;
					$frais_retire = 600;
					$bonus = 333.33;
				break;
				case 50000<$montant AND $montant<=60000:
					$frais = 1600;
					$frais_retire = 600;
					$bonus = 333.33;
				break;
				case 60000<$montant AND $montant<=100000:
					$frais = 1600;
					$frais_retire = 800;
					$bonus = 333.33;
				break;
				case 101900:
					$frais = 2300;
					$frais_retire = 1500;
					$bonus = 666;
				break;
				case 100000<$montant AND $montant<=250000:
					$frais = 3000;
					$frais_retire = 1500;
					$bonus = 666;
				break;
				case 253400:
					$frais = 3000;
					$frais_retire = 1500;
					$bonus = 666;
				break;
				case 250000<$montant AND $montant<=500000:
					$frais = 4300;
					$frais_retire = 1500;
					$bonus = 666;
				break;
				case 504700;
					$frais = 5500;
					$frais_retire = 2500;
					$bonus = 916;
				break;
				case 500000<$montant AND $montant<=1000000:
					$frais = 6500;
					$frais_retire = 2500;
					$bonus = 916;
				break;
				default:
					$frais = "Invalide";
					$bonus = "Invalide";
				break;
			}
			$donne["bonus"] = $bonus;
			$donne["frais"] = $frais;
			$donne["frais_retire"] = $frais_retire;
			return $donne;
		}

		// AIRTEL TRANSACTION --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------


		// ORANGE TRANSACTION --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

		public function GetBonusRetraitOrange($montant)
		{
			switch ($montant) {
				case 200<$montant AND $montant<=1000:
					$bonus = 49;
				break;
				case 1000<$montant AND $montant<=5000:
					$bonus = 66;
				break;
				case 5000<$montant AND $montant<=10000:
					$bonus = 113;
				break;
				case 10000<$montant AND $montant<=20000:
					$bonus = 254;
				break;
				case 20000<$montant AND $montant<=25000:
					$bonus = 254;
				break;
				case 25000<$montant AND $montant<=50000:
					$bonus = 565;
				break;
				case 50000<$montant AND $montant<=100000:
					$bonus = 1017;
				break;
				case 100000<$montant AND $montant<=250000:
					$bonus = 1771;
				break;
				// -------- NOT DONE
				case 250000<$montant AND $montant<=500000:
					$bonus = 1771;
				break;
				case 500000<$montant AND $montant<=1000000:
					$bonus = 2500;
				break;
				// -------- NOT DONE
				// case 1000000<$montant AND $montant<=2000000:
				// 	$bonus = 1500;
				// break;
				default:
					$bonus = "Invalide";
				break;
			}
			return $bonus;
		}

		public function GetAllThreeEnvoieOrange($position, $montant)
		{
			if ($position == "TANA") {
				$res = $this->GetAllThreeEnvoieTanaOrange($montant);

			}else{
				$res = $this->GetAllThreeEnvoieHorsTanaOrange($montant);
			}
			return $res;
		}

		public function GetAllThreeEnvoieTanaOrange($montant)
		{
			switch ($montant) {
				case 200<$montant AND $montant<=1000:
					$frais = 100;
					$bonus = 9;
				break;
				case 1000<$montant AND $montant<=5000:
					$frais = 100;
					$bonus =60;
				break;
				// -------- NOT DONE
					case 5140:
						$frais = 100;
						$bonus = 113;
					break;
					case 5000<$montant AND $montant<=10000:
						$frais = 200;
						$bonus = 113;
					break;
				// -------- NOT DONE
				case 10275:
					$frais = 200;
					$bonus = 188;
				break;
				case 10000<$montant AND $montant<=25000:
					$frais = 400;
					$bonus = 188;
				break;
				// -------- NOT DONE
					case 25650:
						$frais = 400;
						$bonus = 263;
					break;
					case 25000<$montant AND $montant<=50000:
						$frais = 400;
						$bonus = 263;
					break;
				// -------- NOT DONE
				case 51300:
					$frais = 400;
					$bonus = 339;
				break;
				case 50000<$montant AND $montant<=102000:
					$frais = 800;
					$bonus = 339;
				break;
				// case 102000:
				// 	$frais = 800;
				// 	$bonus = 650;
				// break;
				case 102000<$montant AND $montant<=250000:
					$frais = 1500;
					$bonus = 735;
				break;
				// -------- NOT DONE
					case 253500:
						$frais = 1500;
						$bonus = 735;
					break;
					case 250000<$montant AND $montant<=500000:
						$frais = 3000;
						$bonus = 735;
					break;
				// -------- NOT DONE
				case 504800;
					$frais = 2800;
					$bonus = 989;
				break;
				case 500000<$montant AND $montant<=1000000:
					$frais = 4000;
					$bonus = 989;
				break;
				// case 1000000<$montant AND $montant<=2000000:
				// 	$frais = 5000;
				// 	$bonus = 1500;
				// break;
				// case 2015000:
				// 	$frais = 5000;
				// 	$bonus = 1500;
				// break;
				default:
					$frais = "Invalide";
					$bonus = "Invalide";
				break;
			}
			$donne["bonus"] = $bonus;
			$donne["frais"] = $frais;
			$donne["frais_retire"] = 0;
			return $donne;
		}

		public function GetAllThreeEnvoieHorsTanaOrange($montant)
		{
			switch ($montant) {
				case 200<$montant AND $montant<=1000:
					$frais = 200;
					$frais_retire = 50;
					$bonus =9;
				break;
				case 1000<$montant AND $montant<=5000:
					$frais = 200;
					$frais_retire = 50;
					$bonus =60;
				break;
				// -------- NOT DONE
					case 5140:
						$frais = 200;
						$frais_retire = 100;
						$bonus = 113;
					break;
					case 5000<$montant AND $montant<=10000:
						$frais = 300;
						$frais_retire = 100;
						$bonus = 113;
					break;
				// -------- NOT DONE
				case 10275:
					$frais = 400;
					$frais_retire = 200;
					$bonus = 188;
				break;
				case 10000<$montant AND $montant<=25000:
					$frais = 600;
					$frais_retire = 200;
					$bonus = 188;
				break;
				// -------- NOT DONE
					case 25650:
						$frais = 700;
						$frais_retire = 400;
						$bonus = 263;
					break;
					case 25000<$montant AND $montant<=50000:
						$frais = 800;
						$frais_retire = 400;
						$bonus = 263;
					break;
				// -------- NOT DONE
				case 51300:
					$frais = 1200;
					$frais_retire = 800;
					$bonus = 339;
				break;
				case 50000<$montant AND $montant<102000:
					$frais = 1600;
					$frais_retire = 800;
					$bonus = 339;
				break;
				case 102000:
					$frais = 2300;
					$frais_retire = 1500;
					$bonus = 339;
				break;
				case 102000<$montant AND $montant<=250000:
					$frais = 3000;
					$frais_retire = 1500;
					$bonus = 735;
				break;
				case 253500:
					$frais = 3000;
					$frais_retire = 1500;
					$bonus = 735;
				break;
				case 250000<$montant AND $montant<=500000:
					$frais = 4500;
					$frais_retire = 1500;
					$bonus = 735;
				break;
				case 504800;
					$frais = 5300;
					$frais_retire = 2500;
					$bonus = 989;
				break;
				case 500000<$montant AND $montant<=1000000:
					$frais = 6500;
					$frais_retire = 2500;
					$bonus = 989;
				break;
				default:
					$frais = "Invalide";
					$bonus = "Invalide";
				break;
			}
			$donne["bonus"] = $bonus;
			$donne["frais"] = $frais;
			$donne["frais_retire"] = $frais_retire;
			return $donne;
		}


		// ORANGE TRANSACTION -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	}


 ?>