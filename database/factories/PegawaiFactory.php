<?php
// app/database/factories/TaskFactory.php
use Faker\Generator as Faker;


$factory->define(App\Pegawai::class, function (Faker $faker) {
    $users = App\User::pluck('id')->toArray();
    return [
        'name' => $faker->unique()->name,
        'address' => $faker->city,
        'no_reg' => $faker->randomElement($users),
    ];
});