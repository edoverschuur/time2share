<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "Edo Verschuur",
            'email' => "edoverschuur@gmail.com",
            'password' => bcrypt('D13goxdlol'),
            'role' => "Admin",
        ]);
        DB::table('users')->insert([
            'name' => "Kees Vierendrech",
            'email' => "broman@gmail.com",
            'password' => bcrypt('lolxdlol'),
        ]);
        DB::table('users')->insert([
            'name' => "Gerard",
            'email' => "gerard@gmail.com",
            'password' => bcrypt('lolxdlol'),
        ]);
    }
}
