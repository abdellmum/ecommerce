<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('shop_name')->default('MGi');
            $table->string('logo')->nullable();
            $table->string('phone1')->default('+88 01837 889646');
            $table->string('phone2')->nullable();
            $table->string('email')->default('mneshat7@gmail.com');
            $table->string('address')->nullable();
            $table->integer('vat')->nullable();
            $table->integer('shipping_charge')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('youtube_url')->nullable();
            $table->string('vimeo_url')->nullable();
            $table->string('copyright')->nullable();
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
        Schema::dropIfExists('settings');
    }
}
