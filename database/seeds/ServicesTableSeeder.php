<?php

use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = [
            ['name' => 'GET IN THE LAB', 'icon' => 'flaticon-023-flask', 'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla..'],
            ['name' => 'PROJECTS ONLINE', 'icon' => 'flaticon-023-flask', 'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla..'],
            ['name' => 'SMART MARKETING', 'icon' => 'flaticon-023-flask', 'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla..'],
            ['name' => 'DOCUMENTED', 'icon' => 'flaticon-023-flask', 'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla..'],
            ['name' => 'BRAINSTORMING', 'icon' => 'flaticon-023-flask', 'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla..'],
            ['name' => 'SOCIAL MEDIA', 'icon' => 'flaticon-023-flask', 'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla..'],
            ['name' => 'ULTRA MODERN', 'icon' => 'flaticon-023-flask', 'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla..'],
            ['name' => 'RESPONSIVE', 'icon' => 'flaticon-023-flask', 'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla..'],
            ['name' => 'RETINA READY', 'icon' => 'flaticon-023-flask', 'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla..'],  
        ];
        
        DB::table('services')->insert($services);
    }
}
