<?php

use Faker\Generator as Faker;

$factory->define(App\Role::class, function (Faker $faker) {
    return [

        'name' => 'student',

        'display_name' => 'Usuario Estudiante',
      
    ];
});
