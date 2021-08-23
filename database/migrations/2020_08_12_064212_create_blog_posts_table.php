<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('post_category_id');
            $table->string('image')->nullable();
            $table->string('post_title_en', 100);
            $table->string('post_title_bn', 100);
            $table->string('slug', 80)->nullable()->uniqid();
            $table->text('post_description_en');
            $table->text('post_description_bn');
            $table->tinyInteger('status')->nullable();
            $table->timestamps();

            $table->foreign('post_category_id')->references('id')->on('post_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_posts');
    }
}
