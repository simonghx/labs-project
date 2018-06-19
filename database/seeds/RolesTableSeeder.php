<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Role::create([
            "name" => "Administrateur",
            "slug" => "admin"
        ]);

        App\Role::create([
            "name" => "Editeur",
            "slug" => "editor"
        ]);
    }
}
