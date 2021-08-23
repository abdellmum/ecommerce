<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // check if table users is empty
        if(DB::table('users')->get()->count() == 0){

            DB::table('users')->insert([

                [
                    'name'  => 'Sana ullah',
                    'phone' => '01831554683',
                    'email' =>  'mneshat7@gmail.com',
                    'password' => Hash::make('password'),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name'  => 'Sana ullah Tanvi',
                    'phone' => '01831554684',
                    'email' =>  'mneshat8@gmail.com',
                    'password' => Hash::make('password'),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name'  => 'Sana ullah Hridoy',
                    'phone' => '01831554685',
                    'email' =>  'mneshat9@gmail.com',
                    'password' => Hash::make('password'),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]

            ]);

        } else { 
            echo "\e[31mTable is not empty, therefore NOT "; 
        }

    }
}
    