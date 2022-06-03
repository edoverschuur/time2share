<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product')->insert([
            'user_id' => "1",
            'name' => "Elektrische Fiets",
            'description' => "Gloednieuw elektrische fiets, makkelijk te besturen",
            'image' => "/img/bike.png",
            'category' => "Overig",
            'lendTime' => "1"
        ]);
        DB::table('product')->insert([
            'user_id' => "2",
            'name' => "Oplader",
            'description' => "Laad best heel snel op",
            'image' => "/img/charger.png",
            'category' => "Elektronica",
            'lendTime' => "1"
        ]);
        DB::table('product')->insert([
            'user_id' => "2",
            'name' => "Lord of the Rings boek",
            'description' => "Deel 1 van lord of the rings",
            'image' => "/img/book.png",
            'category' => "Literatuur",
            'lendTime' => "1"
        ]);
        DB::table('product')->insert([
            'user_id' => "3",
            'name' => "Luxe stoel",
            'description' => "Mooie moderne stoel",
            'image' => "/img/chair.png",
            'category' => "Meubulair",
            'lendTime' => "1"
        ]);
        DB::table('product')->insert([
            'user_id' => "3",
            'name' => "Sleutels",
            'description' => "Sleutels om mee te knutsellen",
            'image' => "/img/sleutel.png",
            'category' => "Gereedschap",
            'lendTime' => "1"
        ]);
    }
}
