<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Sisya::class, function (Faker $faker) {
    return [
        'user_id' => 100,
        'nama_bapak' => $faker->name,
        'nama_ibu' => $faker->name,
        'alamat' => $faker->address,
        'tingkat' => $faker->randomElement(['Jro Mangku','Jro Mangku Gede','Ida Bhawati']),

    ];
});
