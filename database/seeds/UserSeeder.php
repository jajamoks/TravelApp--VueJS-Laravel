<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $user = factory(App\User::class)->create([
            'name' => 'Chris Wales',
            'email' => 'qwales1@gmail.com',
            'role' => 'admin',
            'password' =>  bcrypt('redsox11'),
            'remember_token' => str_random(10),
        ]);

        $user = factory(App\User::class)->create([
            'name' => 'Erica Gragg',
            'email' => 'erica@escapetoshape.com',
            'role' => 'admin',
            'password' =>  bcrypt('secret'),
            'remember_token' => str_random(10),
        ]);

    }
}
