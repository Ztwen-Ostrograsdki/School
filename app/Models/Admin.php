<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;


/**
 * Class that represents an admin one of these status teacher, parent, member of administration
 * An member of administartion called admin 
 * An admin can be teacher or a parent and reciprocally so he has the threes roles
 * 
 */
class Admin extends Model
{
	use Notifiable;
	use SoftDeletes;

	// protected $role = 'admin'|'teacher'|'parent';

    protected $fillable = ['name', 'role', 'email', 'contact', 'sexe', 'residence', 'birth', 'year', 'month', 'level', 'authorized'
		];


	public static function admins()
	{
		return User::whereRole('admin')->orWhere('id', 1)->get();
	}


	public static function isTeacher($admin):bool
	{
		if ($admin->teacher->toArray() !== []) {
			return true;
		}
		return false;
	}
}
