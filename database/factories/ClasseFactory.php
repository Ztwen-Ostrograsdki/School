<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Classe;
use Faker\Generator as Faker;
Use App\Helpers\Formattors\ZtwenFaker;

$factory->define(Classe::class, function (Faker $faker) {
	return [
		// 'name' => ,
  //       'level' => ,
  //       'year' => ZtwenFaker::year(),
  //       'month' => ZtwenFaker::month()
	];
    
});
