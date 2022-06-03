<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ReviewTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('review')->insert([
            'user_id' => "2",
            'review' => "Beetje vies"
        ]);
        DB::table('review')->insert([
            'user_id' => "2",
            'review' => "Beetje heel erg vies :c"
        ]);
    }
}
