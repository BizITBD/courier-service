<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingDelivery extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_delivery', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id');
            $table->string('delivery_name', 400)->nullable();
            $table->string('delivery_phone', 400)->nullable();
            $table->string('item_description', 1000)->nullable();
            $table->string('special_info')->nullable();
            $table->date('date')->nullable();
            $table->timestamps();


            $table->foreign('booking_id')->references('id')->on('booking_base')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('booking_delivery');
    }
}
