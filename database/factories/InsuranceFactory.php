<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Insurance;
use Faker\Generator as Faker;

$factory->define(Insurance::class, function (Faker $faker) {
    return [

        'organization_name' => $faker->unique()->company,
        'address' => $faker->streetAddress,
        'city' => $faker->city,
        'state' => $faker->stateAbbr,
        'zip' => $faker->postcode,
        'phone' => $faker->tollFreePhoneNumber,
        'fax' => $faker->tollFreePhoneNumber,
        'cms_id' => $faker->randomNumber(5, true),
        'x12_receiver_id' => $faker->randomNumber(2, true),
        'x12_default_partner_id' => $faker->randomNumber(2,true),
        'is_direct' => $faker->boolean

    ];
});
