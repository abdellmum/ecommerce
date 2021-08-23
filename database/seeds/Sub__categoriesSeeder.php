<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Sub__categoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // check if table sub__categories is empty
        if(DB::table('sub__categories')->get()->count() == 0){

            DB::table('sub__categories')->insert([

                [
                    'category_id'      => 1,
                    'subcategory_name' => 'Smartphones',
                    'subcategory_slug' => 'Smartphones',
                ],
                [
                    'category_id'      => 1,
                    'subcategory_name' => 'Feature Phone',
                    'subcategory_slug' => 'Feature Phone',
                ],
                [
                    'category_id'      => 1,
                    'subcategory_name' => 'Tablets',
                    'subcategory_slug' => 'Tablets',
                ],
                [
                    'category_id'      => 1,
                    'subcategory_name' => 'Laptops',
                    'subcategory_slug' => 'Laptops',
                ],
                [
                    'category_id'      => 1,
                    'subcategory_name' => 'Desktops',
                    'subcategory_slug' => 'Desktops',
                ],
                [
                    'category_id'      => 1,
                    'subcategory_name' => 'Gaming Consoles',
                    'subcategory_slug' => 'Gaming Consoles',
                ],
                [
                    'category_id'      => 1,
                    'subcategory_name' => 'Cameras',
                    'subcategory_slug' => 'Cameras',
                ],
                [
                    'category_id'      => 1,
                    'subcategory_name' => 'Security Cameras',
                    'subcategory_slug' => 'Security Cameras',
                ],
                [
                    'category_id'      => 2,
                    'subcategory_name' => "Mobile Accessories",
                    'subcategory_slug' => "Mobile Accessories",
                ],
                [
                    'category_id'      => 2,
                    'subcategory_name' => 'Audio',
                    'subcategory_slug' => 'Audio',
                ],
                [
                    'category_id'      => 2,
                    'subcategory_name' => 'Wearable',
                    'subcategory_slug' => 'Wearable',
                ],
                [
                    'category_id'      => 2,
                    'subcategory_name' => 'Camera Accessories',
                    'subcategory_slug' => 'Camera Accessories',
                ],
                [
                    'category_id'      => 2,
                    'subcategory_name' => 'Computer Accessories',
                    'subcategory_slug' => 'Computer Accessories',
                ],
                [
                    'category_id'      => 2,
                    'subcategory_name' => 'Storage',
                    'subcategory_slug' => 'Storage',
                ],
                [
                    'category_id'      => 2,
                    'subcategory_name' => 'Printers',
                    'subcategory_slug' => 'Printers',
                ],
                [
                    'category_id'      => 2,
                    'subcategory_name' => 'Computer Components',
                    'subcategory_slug' => 'Computer Components',
                ],
                [
                    'category_id'      => 2,
                    'subcategory_name' => 'Software',
                    'subcategory_slug' => 'Software',
                ],
                [
                    'category_id'      => 3,
                    'subcategory_name' => 'Televisions',
                    'subcategory_slug' => 'Televisions',
                ],
                [
                    'category_id'      => 3,
                    'subcategory_name' => 'Cooling & Heating',
                    'subcategory_slug' => 'Cooling & Heating',
                ],
                [
                    'category_id'      => 3,
                    'subcategory_name' => 'Irons & Garment Steamers',
                    'subcategory_slug' => 'Irons & Garment Steamers',
                ],
                [
                    'category_id'      => 3,
                    'subcategory_name' => 'Water Purifiers & Filters',
                    'subcategory_slug' => 'Water Purifiers & Filters',
                ],

            ]);

        } else {
            echo "\e[31mTable is not empty, therefore NOT "; 
        }

    }
}
