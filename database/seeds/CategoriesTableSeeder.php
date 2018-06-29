<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Categorie::create([
            "name" => "Web",
        ]);
        
        App\Categorie::create([
            "name" => "Design",
        ]);

        App\Categorie::create([
            "name" => "Culture",
        ]);

        App\Categorie::create([
            "name" => "Technologie",
        ]);
    }
}
