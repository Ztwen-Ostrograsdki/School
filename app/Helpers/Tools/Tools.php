<?php
	
namespace App\Helpers\Tools;


class Tools{


	public static function subjects($level = null):?array
	{
		$allSubjects = ['Français', 'Anglais', 'Histoire-Géographie', 'Allemand', 'Espagnol', 'Philosophie', 'Sociologie', 'Histoire-Géographie', 'Poésie', 'Contes', 'EST', 'Droit', 'Mathématiques', 'Physique-Chimie-Technologie', 'Biologie', 'Informatique', 'Comptabilité', 'Sport'];

		$primarySubjects = ['Français', 'Anglais', 'Histoire-Géographie', 'Poésie', 'Contes', 'EST', 'Mathématiques', 'Informatique', 'Sport'];

		$secondarySubjects = ['Français', 'Anglais', 'Histoire-Géographie', 'Allemand', 'Espagnol', 'Philosophie', 'Sociologie', 'Droit', 'Mathématiques', 'Physique-Chimie-Technologie', 'Biologie', 'Informatique', 'Comptabilité', 'Economie', 'Sport'];

		if ($level === null) {
			
			return $allSubjects;
		}
		else{
			if ($level == "primary") {
				return $primarySubjects;
			}
			elseif ($level == "secondary") {
				return $secondarySubjects;
			}
		}
	}


	public static function classes($level = null):?array
	{
		$secondaryClasses = ['Sixième', 'Cinquième', 'Troisième', 'Seconde-A', 'Seconde-AB', 'Seconde-G1', 'Seconde-G2', 'Seconde-C', 'Seconde-D', 'Première-AB', 'Première-A', 'Première-G1', 'Première-G2', 'Première-D', 'Première-C', 'Terminale-AB', 'Terminale-A', 'Terminale-C', 'Terminale-D', 'Terminale-G1', 'Terminale-G2'];
		$primaryClasses = ['Maternelle', 'CI', 'CP', 'CE1', 'CE2', 'CM1', 'CM2'];

		if ($level !== null) {
			if ($level == "primary") {
				return $primaryClasses;
			}
			elseif ($level == "secondary") {
				return $secondaryClasses;
			}
		}
		else{
			return [];
		}
	}

	public static function levels()
	{
		$levels = [
			'primary' => 'Le Primaire',
			'secondary' => 'Le Secondaire',
			'superior' => 'Le Supérieur'
		];
		return $levels;
	}

	public static function months()
	{
		$months = [
            "Janvier",
            "Février",
            "Mars",
            "Avril",
            "Mai",
            "Juin",
            "Juillet",
            "Août",
            "Septembre",
            "Octobre",
            "Novembre",
            "Décembre"

        ];
		return $months;
	}

	public static function years()
	{
		$years = [2014, 2015, 2016, 2017, 2018, 2019];
		return years;
	}

}