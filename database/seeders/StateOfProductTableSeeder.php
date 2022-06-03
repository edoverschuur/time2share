<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class StateOfProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('state_of_product')->insert([
            'state' => "Lendable",
        ]);
        DB::table('state_of_product')->insert([
            'state' => "Lending",
        ]);
        DB::table('state_of_product')->insert([
            'state' => "Pending",
        ]);
        DB::table('state_of_product')->insert([
            'state' => "Blocked",
        ]);
    }
}
