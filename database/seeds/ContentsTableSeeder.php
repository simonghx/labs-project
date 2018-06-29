<?php

use Illuminate\Database\Seeder;

class ContentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $contents =[
            ['name' => 'logo-main', 'titre' => null, 'texte' => null, 'image' => 'p0JSNggJ2xERvpfymRpjpOHL6vWJoEOPyNNjVpJB.png'],
            ['name' => 'sous-titre-main', 'titre' => 'Get your freebie template now!', 'texte' => null, 'image' => null],
            ['name' => 'titre1', 'titre' => 'GET IN THE LAB AND DISCOVER THE WORLD', 'texte' => null, 'image' => null],
            ['name' => 'texte1', 'titre' => null, 'texte' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla. Nulla sit amet luctus dolor. Etiam finibus consequat ante ac congue. Quisque porttitor porttitor tempus. Donec maximus ipsum non ornare vporttitor porttitorestibulum. Sed libero nibh, feugiat at enim id, bibendum sollicitudin arcu.', 'image' => null],
            ['name' => 'texte2', 'titre' => null, 'texte' => 'Cras ex mauris, ornare eget pretium sit amet, dignissim et turpis. Nunc nec maximus dui, vel suscipit dolor. Donec elementum velit a orci facilisis rutrum. Nam convallis vel erat id dictum. Sed ut risus in orci convallis viverra a eget nisi. Aenean pellentesque elit vitae eros dignissim ultrices. Quisque porttitor porttitorlaoreet vel risus et luctus.', 'image' => null],
            ['name' => 'image-youtube', 'titre' => null, 'texte' => null, 'image' => 'MypdTu94cUjmK5Ardulg05nzl8YHWWUTPcUMqQn6.jpeg'],
            ['name' => 'lien-youtube', 'titre' => 'http://www.youtube.com', 'texte' => null, 'image' => null],
            ['name' => 'titre-services', 'titre' => 'GET IN THE LAB AND SEE THE SERVICES', 'texte' => null, 'image' => null],
            ['name' => 'titre-team', 'titre' => 'GET IN THE LAB AND MEET THE TEAM', 'texte' => null, 'image' => null],
            ['name' => 'titre-ready', 'titre' => 'Are you ready to stand out?', 'texte' => null, 'image' => null],
            ['name' => 'sous-titre-ready', 'titre' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est.', 'texte' => null, 'image' => null],
            ['name' => 'titre-contact', 'titre' => 'Contact Us', 'texte' => null, 'image' => null],
            ['name' => 'texte-contact', 'titre' => null, 'texte' => 'Cras ex mauris, ornare eget pretium sit amet, dignissim et turpis. Nunc nec maximus dui, vel suscipit dolor. Donec elementum velit a orci facilisis rutrum.', 'image' => null],
            ['name' => 'sous-titre-contact', 'titre' => 'Main Office', 'texte' => null, 'image' => null],
            ['name' => 'adresse', 'titre' => 'C/ Libertad, 34', 'texte' => null, 'image' => null],
            ['name' => 'postal', 'titre' => '05200 Arévalo', 'texte' => null, 'image' => null],
            ['name' => 'phone', 'titre' => '0034 37483 2445 322', 'texte' => null, 'image' => null],
            ['name' => 'contact-mail', 'titre' => 'hello@company.com', 'texte' => null, 'image' => null],
            ['name' => 'titre-projet', 'titre' => 'GET IN THE LAB AND DISCOVER THE WORLD', 'texte' => null, 'image' => null],
            ['name' => 'quote', 'titre' => null, 'texte' => 'Vivamus in urna eu enim porttitor consequat. Proin vitae pulvinar libero. Proin ut hendrerit metus. Aliquam erat volutpat. Donec fermen tum convallis ante eget tristique. Sed lacinia turpis at ultricies vestibulum.', 'image' => null],
        ];
        
        DB::table('contents')->insert($contents);
    }
}
