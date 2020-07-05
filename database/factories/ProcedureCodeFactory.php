<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ProcedureCode;
use Faker\Generator as Faker;

$factory->define(ProcedureCode::class, function (Faker $faker) {
    return [
        'cpt_code' => $faker->unique()->randomNumber(5, true),
        'cpt_description' => $faker->text(30),
        'category' => $faker->numberBetween(1,6),
        'version' => 'CPT4',
        'is_active' => $faker->boolean
    ];
});
