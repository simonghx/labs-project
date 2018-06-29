<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Tag::create([
            "name" => "web development",
        ]);
        App\Tag::create([
            "name" => "MolenGeek",
        ]);
        App\Tag::create([
            "name" => "Hack ta life",
        ]);
        App\Tag::create([
            "name" => "laptop",
        ]);
        App\Tag::create([
            "name" => "application",
        ]);
        App\Tag::create([
            "name" => "mobile",
        ]);
    }
}
