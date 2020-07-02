<?php


namespace App\Helpers;

use App\User;

class BigRestorer{


	public static function restore(User $user)
	{
		$user->restore();
		$voitures = $user->voitures()->withTrashed('deleted_at')->get();

		foreach ($voitures as $voiture) {
			$voiture->restore();
		}
	}

}