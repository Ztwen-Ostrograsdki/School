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

	
}
