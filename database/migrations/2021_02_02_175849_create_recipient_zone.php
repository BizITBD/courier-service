<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipientZone extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipient_zone', function (Blueprint $table) {
            $table->id();
            $table->string('zone_name');
            $table->foreignId('city_id')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();

            $table->foreign('city_id')->references('id')->on('city_models')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipient_zone');
    }
}
