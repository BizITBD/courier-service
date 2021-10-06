<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingRecipient extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_recipient', function (Blueprint $table) {
            $table->id();
            $table->foreignId('zone_id')->nullable();
            $table->foreignId('booking_id')->nullable();
            $table->string('recipient_name', 200);
            $table->string('recipient_address', 200);
            $table->string('recipient_phone', 200);
            $table->foreignId('city_id')->nullable();
            $table->string('recipient_area', 200);
            $table->date('date')->nullable();
            $table->timestamps();


            $table->foreign('booking_id')->references('id')->on('booking_base')->onDelete('cascade');
            $table->foreign('zone_id')->references('id')->on('recipient_zone')->onDelete('cascade');
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
        Schema::dropIfExists('booking_recipient');
    }
}
