<?php
	
namespace App\Helpers\Seeders;
use App\Helpers\Formattors\ZtwenFaker;
use App\Helpers\Tools\Tools;
use App\Models\Classe;


class Seeders{


	public static function getSubjects():?array
	{
		$primarySubjects = Tools::subjects('primary');
		$secondarySubjects = Tools::subjects('secondary');

		if (auth()->check()) {
	        $creator = auth()->user()->name;
	    }
	    else{
	        $creator = null;
	    }

		$subjects = [];

		for($i = 0; $i < count($primarySubjects); $i++){
			$subjects[] = ['name' => $primarySubjects[$i], 'level' => 'primary', 'year' => ZtwenFaker::year(), 'month' => ZtwenFaker::month(), 'creator' => $creator];
		}

		for($j = 0; $j < count($secondarySubjects); $j++){
			$subjects[] = ['name' => $secondarySubjects[$j], 'level' => 'secondary', 'year' => ZtwenFaker::year(), 'month' => ZtwenFaker::month(), 'creator' => $creator];
		}

		return $subjects;

	}

	public static function getClasses():?array
	{
		if (auth()->check()) {
	        $creator = auth()->user()->name;
	    }
	    else{
	        $creator = null;
	    }
	    
		$primaryClasses = Tools::classes('primary');
		$secondaryClasses = Tools::classes('secondary');

		$subjects = [];

		for($i = 0; $i < count($primaryClasses); $i++){
			$classes[] = ['name' => $primaryClasses[$i], 'level' => 'primary', 'year' => ZtwenFaker::year(), 'month' => ZtwenFaker::month(), 'creator' => $creator];
		}

		for($j = 0; $j < count($secondaryClasses); $j++){
			$classes[] = ['name' => $secondaryClasses[$j], 'level' => 'secondary', 'year' => ZtwenFaker::year(), 'month' => ZtwenFaker::month(), 'creator' => $creator];
		}
		
		return $classes;

	}

	/**
	 * [teachersAndClassesJoiner description]
	 * @param  Classe      $classe            [description]
	 * @param  int|integer $maxClasseTeaching [nombre de classe gardée dans l'ets pour même discipline]
	 * @param  int|integer $maxHeteroClasses  [nombre de classe gardée dans l'ets pour differentes disciplines]
	 * @return [type]                         [description]
	 */
	/*public function teachersAndClassesJoiner(Classe $classe, int $maxClasseTeaching = 2, int $maxHeteroClasses = 4)
	{
		//Recuperation des matières liées à la classe
		$hisSubjects = $classe->subjects;
		//On parcours les differentes matières
		foreach ($hisSubjects as $hisSubject) {
			$teachers = Teacher::whereLevel('secondary')->get();

			$acceptedTeachers = []; // Les prof qui sont compatibles à la matières
			$tableSub = [];

			// On parcours les prof du secondaire
			foreach ($teachers as $teacher) {
				$subTeacher = $teacher->subjects; // On recupère les matires de chaque prof

				//On parcours chacun de ces matières
				foreach ($subTeachers as $subTeacher) {
					//Les matières du prof en cours et son id
					$tableSub[$subTeacher->id] = $subTeacher->name;
				}

				// On verifie si la matière de la classe pointée (il s'agit de la matière pointée) est dans la liste des matières du prof
				$hisClasses = [];
				if (in_array($hisSubject, $tableSub)) {
					//On reccupère les classes du prof
					$teacherClasses = $teacher->classes;
					$tableOfOccurences = [];
					if (teacherClasses->toArray() !== []) {
						if (count($teacherClasses->toArray()) < $maxHeteroClasses) {
							$hisClasses[] = $teacher->classes->id;
							// On verifie la matière que le prof enseigne dans chacune de ces classes
							foreach ($hisClasses as $hisClasse) {
								$ts = (Classe::find($hisClasse))->teachers;
								$tableTeachers = [];
								if ($ts->toArray() !== []) {
									foreach ($ts as $t) {
										$tableTeachers[] = $t;
									}
									foreach ($tableTeachers as $tableTeacher) {
										// $sub = $tableTeacher->
										if ($) {
											# code...
										}
									}

								}
								else{
									//On ajoute le prof si la classe n'a encore aucun prof
									$acceptedTeachers[] = $subTeacher->id;
								}
							}
						}
						else{
							//On refuse le prof qui a déjà trop de classes
						}
					}
					//On ajoute forcément le prof qui n'a encore aucune salle
					else{
						$acceptedTeachers[] = $subTeacher->id;
					}

					
				}

				// On verifie si le prof n'enseigne pas déjà cette matières dans plus d'une classe

			}
		}
	}*/





}