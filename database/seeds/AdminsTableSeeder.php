<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        if(DB::table('admins')->get()->count() == 0){

            DB::table('admins')->insert([

                [
                    'name'      => 'karim abdell',
                    'phone'     => '0666666666',
                    'email'     =>  'admin@gmail.com',
                    'password'  => Hash::make('admin123'),
                    'category'  => '1',
                    'coupon'    => '1',
                    'product'   => '1',
                    'blog'      => '1',
                    'order'     => '1',
                    'report'    => '1',
                    'user_role'    => '1',
                    'return_order'  => '1',
                    'contact_message'  => '1',
                    'product_comment'  => '1',
                    'product_stock'  => '1',
                    'setting'  => '1',
                    'other'  => '1',
                    'user_type' => '1',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name'  => 'admin admin',
                    'phone' => '0626565101',
                    'email' =>  'karimovich75@gmail.com',
                    'password' => Hash::make('admin123'),
                    'category'  => '1',
                    'coupon'    => '1',
                    'product'   => '1',
                    'blog'      => '1',
                    'order'     => '1',
                    'report'    => '1',
                    'user_role'    => '1',
                    'return_order'  => '1',
                    'contact_message'  => '1',
                    'product_comment'  => '1',
                    'product_stock'  => '1',
                    'setting'  => '1',
                    'other'  => '1',
                    'user_type' => '1',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name'  => 'kim kim',
                    'phone' => '065566556655',
                    'email' =>  'kim@gmail.com',
                    'password' => Hash::make('admin123'),
                    'category'  => '1',
                    'coupon'    => '1',
                    'product'   => '1',
                    'blog'      => '1',
                    'order'     => '1',
                    'report'    => '1',
                    'user_role'    => '1',
                    'return_order'  => '1',
                    'contact_message'  => '1',
                    'product_comment'  => '1',
                    'product_stock'  => '1',
                    'setting'  => '1',
                    'other'  => '1',
                    'user_type' => '1',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]

            ]);

        } else {
            echo "\e[31mTable is not empty, therefore NOT ";
        }
    }
}
