<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiteSettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // check if table users is empty
        if(DB::table('settings')->get()->count() == 0){

            DB::table('settings')->insert([

                [
                    'shop_name'  => 'ASS.com',
                    'phone1' => '01831554683',
                    'phone2' => '01720873939',
                    'email' =>  'mneshat7@gmail.com',
                    'address' => 'Osmanpur, Zorargong, Mirsarai, Chittagong',
                    'vat'     => '5',
                    'shipping_charge' => '10',
                    'facebook_url'  => 'https://www.facebook.com/',
                    'twitter_url'   => 'https://twitter.com/?lang=en',
                    'youtube_url'   => 'https://www.youtube.com/',
                    'vimeo_url'     => 'https://vimeo.com/',
                    'copyright'  => 'Sana Ullah Tanvi',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]

            ]);

        } else { 
            echo "\e[31mTable is not empty, therefore NOT "; 
        }

    }
}
