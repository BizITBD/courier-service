<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_settings', function (Blueprint $table) {
            $table->id();
            $table->longText('terms_and_conditions')->nullable();
            $table->string('banner_picture', 1000)->nullable();
            $table->string('company_logo', 1000)->nullable();
            $table->string('fav_icon', 500)->nullable();
            $table->string('banner_text', 500)->nullable();
            $table->string('count_rorder', 500)->nullable();
            $table->string('count_pending', 500)->nullable();
            $table->string('count_delivery', 500)->nullable();
            $table->longText('footer_blog')->nullable();
            $table->longText('footer_about')->nullable();
            $table->longText('footer_privacy')->nullable();


            $table->string('banner1', 50)->nullable();
            $table->string('banner2', 50)->nullable();
            $table->string('banner3', 50)->nullable();
            $table->string('footer_terms', 9000)->nullable();
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
        Schema::dropIfExists('app_settings');
    }
}
