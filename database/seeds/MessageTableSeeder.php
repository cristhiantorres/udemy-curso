<?php

use App\Message;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class MessageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Message::truncate();

        for ($i = 1; $i < 101; $i++) {
            Message::create([

            'name'  => "Usuario $i",

            'email' => "usuario$i@correo.com",

            'text'  => "Este texto es del mensaje del Usuario $i",

            'created_at'  => Carbon::now()->subDays(100)->addDays($i),

          ]);
        }
    }
}
