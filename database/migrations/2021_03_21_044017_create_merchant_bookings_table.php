<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMerchantBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchant_bookings', function (Blueprint $table) {
            $table->id();
            $table->string('booking_id', 50)->nullable();
            $table->foreignId('merchant_id')->nullable();
            $table->string('recipient_name', 100)->nullable();
            $table->string('store_name', 30)->nullable();
            $table->string('recipient_phone', 50)->nullable();
            $table->string('recipient_address', 100)->nullable();
            $table->string('recipient_city', 100)->nullable();
            $table->string('recipient_area', 100)->nullable();
            $table->string('charge_type', 100)->nullable();
            $table->string('charges', 100)->nullable();
            $table->string('special_info', 500)->nullable();
            $table->string('cashto_collect', 100)->nullable();
            $table->string('product_price', 100)->nullable();
            $table->decimal('pay', 8, 2)->nullable();
            $table->decimal('paid', 8, 2)->nullable();
            $table->decimal('due', 8, 2)->nullable();
            $table->decimal('payable', 8, 2)->nullable();
            $table->boolean('status')->default(1);
            $table->date('date')->nullable();
            $table->timestamps();
            $table->foreign('merchant_id')->references('id')->on('resellers')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('merchant_bookings');
    }
}
