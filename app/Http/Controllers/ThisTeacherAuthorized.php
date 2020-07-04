<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class ThisTeacherAuthorized extends Controller
{
	/**
	 * Use to authorized only the user to access to his class or his data
	 * @param  [type] $teacher [description]
	 * @return [type]          [description]
	 */
    public static function authorized(Teacher $teacher)
    {
    	$user = auth()->user();
    	if ($user->teachers->toArray()!== [] && $user->teacher()->id === $teacher->id) {
    		
    	}
    	else{
    		abort(403, "Vous étes pas autorisé");
    	}
    }
}
