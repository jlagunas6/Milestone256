<?php

use App\Models\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'id' => '-1',
        'first_name' => $faker->name,
        'middle_name'=> $faker->name,
        'last_name' => $faker->name,
        'email' => 'snoopy@puppy.com',
        'password' => 'SnipSnip', // password
        'admin_role'=>'0',
        'created_on' =>NULL,
        'active'=> '1',
        'remember_token' => Str::random(10),
        

    ];
});
