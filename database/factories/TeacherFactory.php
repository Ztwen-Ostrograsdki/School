<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Teacher;
use Faker\Generator as Faker;
Use App\Helpers\Formattors\ZtwenFaker;

$factory->define(Teacher::class, function (Faker $faker) {
	
    return [
        'name' => trim(mb_ereg_replace('/Mr\.|M\.|Mrs.|Prof\.|Sr\.|Me\.|Dr\.|Pr\.|Mlle\.|Mme.|Ms\./', '', $faker->name)),
        'level' => 'primary',
        'year' => ZtwenFaker::year(),
        'month' => ZtwenFaker::month(),
        'residence' => ZtwenFaker::residence(),
        'contact' => ZtwenFaker::phoneNumber(),
        'sexe' => ZtwenFaker::gender(),
        'email' => $faker->unique()->safeEmail,
        'birth' => $faker->dateTimeThisCentury->format('Y-m-d'),

    ];
});
