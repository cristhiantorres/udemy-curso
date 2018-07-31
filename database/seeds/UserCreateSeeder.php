<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class UserCreateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        Role::truncate();

        DB::table('assigned_roles')->truncate();

        $user = User::create([

          'name'      => 'Administrador',

          'email'     => 'admin@correo.com',

          'password'  => bcrypt('admin123'),

        ]);

        $role = Role::create([

          'name'          => 'admin',

          'display_name'  => 'Administrador del Sitio',

        ]);

        $user->roles()->attach($role);
    }
}
