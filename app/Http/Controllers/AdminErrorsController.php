<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminErrorsController extends Controller
{
   	

   	public static function type403()
   	{
   		return abort(403, "Unauthorized to access this page");
   	}

   	public function type404()
   	{
   		return abort(404);
   	}

}
