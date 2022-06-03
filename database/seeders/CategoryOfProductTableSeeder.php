<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class CategoryOfProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category_of_product_array = ["Elektronica","Literatuur","Gereedschap","Meubulair","Overig"];

        foreach($category_of_product_array as $category_of_product){
            DB::table('category_of_product')->insert([
                'category' => $category_of_product
            ]);
        }
    }
}
