<?php

namespace App\Models;

use App\Helpers\TrashedGet;
use App\Models\Classe;
use App\Models\Subject;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Teacher extends Model
{
    use Notifiable;
	use SoftDeletes;

	protected $roles = [];

    protected $fillable = ['name', 'email', 'contact', 'sexe', 'residence', 'birth', 'year','month', 'level', 'parent', 'subject_id', 'firstName', 'surname', 'creator', 'editor', 'authorized'
		];

	public static function getBlockeds(string $level = null)
    {
        $blocked = (new TrashedGet(Teacher::class))->getDeleted($level);
        return $blocked;
    }

	public function classes()
	{
		return $this->morphToMany(Classe::class, 'classable');
	}

	public function users()
	{
		return $this->morphToMany(User::class, 'userable');
	}

	public function user()
	{
		return $this->users()->get()[0];
	}

	/**
	 * To know if the teacher has user in the database
	 * @return boolean [description]
	 */
	public function hasUser()
	{
		return $this->users->toArray() !== [];
	}

	/**
	 * defined is the model is the ae of his subject
	 * @return boolean [description]
	 */
	public function isAE():bool
	{
		return $this->classe !== null;
	}


	
	public function subject()
	{
		return $this->belongsTo(Subject::class);
	}

	public function classe()
	{
		return $this->hasOne(Classe::class);
	}

	public function gender()
	{
		if ($this->sexe === 'female') {
			return 'Mr ';
		}
		else{
			return 'Mme ';
		}
	}

	/**
	 * [classesConcernedByThisTeacher description]
	 * @return array Collection of classes Model
	 */
	public function classesConcernedByThisTeacher()
	{
		$classesConcerned = [];
		foreach (Classe::whereLevel('secondary')->get() as $c) {
            $classeSubjects = [];
            foreach ($c->subjects as $classeSub) {
                $classeSubjects[] = $classeSub->id;
            }
            if (in_array($this->subject->id, $classeSubjects)) {
                $classesConcerned[$c->id] = $c;
            }
        }
        return $classesConcerned;
	}


	/**
	 * [classesConcernedByThisTeacherButNot description]
	 * @return array classes array id as key with classe name as value
	 */
	public function classesConcernedByThisTeacherButNot($except = null)
	{
		$classesRufused = [];
		$except == null ? $classesConcerned = $this->classesConcernedByThisTeacher() : $classesConcerned = Classe::whereLevel($except)->get();

		foreach ($classesConcerned as $c) {
			$subjectsAlreadyHasTeachers = [];
			$hisTeachers = $c->teachers;

			if (count($hisTeachers) > 0) {
				foreach ($hisTeachers as $t) {
					if ($t->id !== $this->id) {
						$subjectsAlreadyHasTeachers[] = $t->subject_id;
					}
				}
			}

			if (in_array($this->subject_id, $subjectsAlreadyHasTeachers)) {
				$classesRufused[$c->id] = $c->name;
			}

		}

		return $classesRufused;
	}

	
}
