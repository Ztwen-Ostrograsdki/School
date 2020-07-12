<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Pupil;
use Faker\Generator as Faker;
use App\Helpers\Formattors\ZtwenFaker;

$factory->define(Pupil::class, function (Faker $faker) {
    if (auth()->check()) {
        $creator = auth()->user()->name;
    }
    else{
        $creator = null;
    }
	$classes = App\Models\Classe::all();
	$classe = $classes[rand(0, count($classes) - 1)];

	$level = $classe->level;
	$classe_id = $classe->id;
    return [
        'name' => mb_ereg_replace('/Mr\.|M\.|Mrs.|Prof\.|Sr\.|Me\.|Dr\.|Pr\.|Mlle\.|Mme\./', '', $faker->name),
        'sexe' => ZtwenFaker::gender(),
        'level' => $level,
        'creator' => $creator,
        'classe_id' => $classe_id,
        'status' => 0,
        'birth' => $faker->dateTimeThisCentury->format('Y-m-d'),
        'year' => ZtwenFaker::year(),
        'month' => ZtwenFaker::month()
    ];
});
