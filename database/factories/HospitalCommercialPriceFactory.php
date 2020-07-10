<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\HospitalCommercialPrice;
use Faker\Generator as Faker;

$factory->define(HospitalCommercialPrice::class, function (Faker $faker) {
    return [
        'insurance_id' => App\Insurance::all()->random()->id,
        'hospital_id' => App\Hospital::all()->random()->id,
        'procedure_code_id' => App\ProcedureCode::all()->random()->id,
        'price' => $faker->randomFloat(2, 100, 100000),
        'network_price' => $faker->randomFloat(2, 100, 100000)
    ];
});
