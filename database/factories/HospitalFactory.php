<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Hospital;
use Faker\Generator as Faker;

$factory->define(Hospital::class, function (Faker $faker) {
    return [
        'organization_name' => $faker->unique()->company,
        'address' => $faker->streetAddress,
        'city' => $faker->city,
        'state' => $faker->stateAbbr,
        'zip' => $faker->postcode,
        'npi' => $faker->numerify('##########'),
        'tax_id' => $faker->ein,
        'phone' => $faker->tollFreePhoneNumber,
        'fax' => $faker->tollFreePhoneNumber
    ];
});
