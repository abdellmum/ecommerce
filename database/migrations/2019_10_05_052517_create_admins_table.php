<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('phone')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 80);
            $table->rememberToken();
            $table->string('profile')->nullable();
            $table->tinyInteger('category')->nullable();
            $table->tinyInteger('coupon')->nullable();
            $table->tinyInteger('product')->nullable();
            $table->tinyInteger('blog')->nullable();
            $table->tinyInteger('order')->nullable();
            $table->tinyInteger('report')->nullable();
            $table->tinyInteger('user_role')->nullable();
            $table->tinyInteger('return_order')->nullable();
            $table->tinyInteger('contact_message')->nullable();
            $table->tinyInteger('product_comment')->nullable();
            $table->tinyInteger('product_stock')->nullable();
            $table->tinyInteger('setting')->nullable();
            $table->tinyInteger('other')->nullable();
            $table->tinyInteger('user_type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
