<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingPaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_payment', function (Blueprint $table) {
            $table->id();
            $table->string('type', 150);
            $table->foreignId('invoice_id');
            $table->foreignId('reseller_id');
            $table->integer('amount');
            $table->date('date');
            $table->timestamps();
            $table->foreign('invoice_id')->references('id')->on('booking_base')->onDelete('cascade');
            $table->foreign('reseller_id')->references('id')->on('resellers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('booking_payment');
    }
}
