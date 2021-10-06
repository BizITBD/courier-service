<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryArea extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_area', function (Blueprint $table) {
            $table->id();
            $table->string('area_name', 200);
            $table->foreignId('zone_id');
            $table->boolean('status')->default(1);
            $table->timestamps();

            $table->foreign('zone_id')->references('id')->on('recipient_zone')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('delivery_area');
    }
}
