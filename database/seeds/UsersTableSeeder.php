<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            "name" => "Simon Gheux",
            "email" => "simongheux@gmail.com",
            "password" => bcrypt('azerty'),
            "role_id" => 1,
        ]);

        App\User::create([
            "name" => "Sami Hajji",
            "email" => "hajjisami@gmail.com",
            "password" => bcrypt('azerty'),
            "role_id" => 2,
        ]);
    }
}
