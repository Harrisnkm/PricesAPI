<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Practice;
use Faker\Generator as Faker;

$factory->define(Practice::class, function (Faker $faker) {
    return [
        'organization_name' => $faker->unique()->company,
        'address' => $faker->streetAddress,
        'city' => $faker->city,
        'state' => $faker->stateAbbr,
        'zip' => $faker->postcode,
        'npi' => $faker->numerify('##########'),
        'tax_id' => $faker->ein,
        'phone' => $faker->tollFreePhoneNumber,
        'fax' => $faker->tollFreePhoneNumber,
        'is_group_practice' => $faker->boolean
    ];
});
