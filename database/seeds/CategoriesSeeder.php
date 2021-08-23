<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // check if table categories is empty
        if(DB::table('categories')->get()->count() == 0){

            DB::table('categories')->insert([

                [
                    'category_name'  => "Electronic Devices",
                    'category_slug' => "Electronic Devices",
                ],
                [
                    'category_name'  => "Electronic Accessories",
                    'category_slug' => "Electronic Accessories",
                ],
                [
                    'category_name'  => "TV & Home Appliances",
                    'category_slug' => "TV & Home Appliances",
                ],
                [
                    'category_name'  => 'Health & Beauty',
                    'category_slug' => 'Health & Beauty',
                ],
                [
                    'category_name'  => 'Babies & Toys',
                    'category_slug' => 'Babies & Toys',
                ],
                [
                    'category_name'  => 'Groceries & Pets',
                    'category_slug' => 'Groceries & Pets',
                ],
                [
                    'category_name'  => "Home & Lifestyle",
                    'category_slug' => "Home & Lifestyle",
                ],
                [
                    'category_name'  => "Women's Fashion",
                    'category_slug' => "Women's Fashion",
                ],
                [
                    'category_name'  => "Men's Fashion",
                    'category_slug' => "Men's Fashion",
                ],
                [
                    'category_name'  => "Watches & Accessories",
                    'category_slug' => "Watches & Accessories",
                ],
                [
                    'category_name'  => "Sports & Outdoor",
                    'category_slug' => "Sports & Outdoor",
                ],
                [
                    'category_name'  => "Automotive & Motorbike",
                    'category_slug' => "Automotive & Motorbike",
                ]

            ]);

        } else {
            echo "\e[31mTable is not empty, therefore NOT "; 
        }
    
    }
}
