<?php 

namespace App\Http\ValidatorsSpaces;

use App\Models\Teacher;
use Illuminate\Support\Facades\Validator;

trait TeachersValidators {


	    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return array|bool
     */
    
    public function teacherValidateClasses(array $data, $id)
    {

        $classesConfirmed = [];
        $classables = [];

        $teacher = Teacher::withTrashed('deleted_at')->whereId($id)->firstOrFail();
        
        if ($teacher->level == "secondary") {
            $classesConcerned = $teacher->classesConcernedByThisTeacher(); //Classes pouvant recevoir les cours de l'enseignant
            $classesRefused = $teacher->classesConcernedByThisTeacherButNot();
            $classes = [$data['classe1'], $data['classe2'], $data['classe3'], $data['classe4'], $data['classe5']];

            foreach ($classesConcerned as $c) {
                $classables[] = $c->id;
            }

            foreach ($classes as $classe) {
                if ($classe !== null && in_array($classe, $classables) && !array_key_exists($classe, $classesRefused)) {
                    $classesConfirmed[] = $classe;
                }
            }


            if (count(array_flip($classesConfirmed)) <= 0) {
               return false;
            }

            $classesConfirmedNotDuplicate = [];
            $teachersOldClassesOnID = [];
            $teachersOldClasses = $teacher->classes;

            if (count($teachersOldClasses) > 0) {
                foreach ($teachersOldClasses as $teachersOldClasse) {
                   $teachersOldClassesOnID[] = $teachersOldClasse->id;
                }
            }

            foreach (array_flip(array_flip($classesConfirmed)) as $cv) {
                //Suppression des duplicata
                if (!in_array($cv, $teachersOldClassesOnID)) {
                    // On selection uniquement par les classes envoyées celles que le prof ne gardait pas
                    $classesConfirmedNotDuplicate[] = $cv;
                }
            }

            return $classesConfirmedNotDuplicate == [] ? false : $classesConfirmedNotDuplicate;
        }
        else{
            $classes = $data['classe'];
            return [$classes];
        }

    
    }




}



