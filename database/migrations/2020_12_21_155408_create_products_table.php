<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('subcategory_id');
            $table->integer('brand_id')->nullable();
            $table->string('product_name', 100);
            $table->string('slug', 80)->nullable();
            $table->string('product_code')->uniqid();
            $table->string('product_quantity', 12)->nullable();
            $table->text('product_details');
            $table->string('product_colour', 24)->nullable();
            $table->string('product_size', 30)->nullable();
            $table->string('selling_price', 12);
            $table->string('discount_price', 12)->nullable();
            $table->string('video_link')->nullable();
            $table->tinyInteger('main_slider')->nullable();
            $table->tinyInteger('hot_deal')->nullable();
            $table->tinyInteger('best_rated')->nullable();    
            $table->tinyInteger('mid_slider')->nullable();
            $table->tinyInteger('hot_new')->nullable();
            $table->tinyInteger('bye_one_get_one')->nullable();
            $table->tinyInteger('trend')->nullable();
            $table->string('image_one');
            $table->string('image_two')->nullable();
            $table->string('image_three')->nullable();
            $table->integer('status')->nullable();
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('subcategory_id')->references('id')->on('sub__categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
