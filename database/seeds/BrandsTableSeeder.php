<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // check if table Brands is empty

        if(DB::table('brands')->get()->count() == 0){

            DB::table('brands')->insert([
                'brand_name'  => "Unknown",
                'brand_slug'  => "Unknown",
            ]);

        } else {
            echo "\e[31mTable is not empty, therefore NOT "; 
        }
    }
}
