<?php

use Faker\Generator as Faker;

$factory->define(App\Role::class, function (Faker $faker) {
    return [

        'name' => 'guest',

        'display_name' => 'Usuario Invitado',
      
    ];
});
