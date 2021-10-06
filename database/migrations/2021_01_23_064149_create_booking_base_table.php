<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingBaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_base', function (Blueprint $table) {
            $table->id();
            $table->string('store', 200);
            $table->string('product_type', 200);
            $table->string('order_id')->nullable();
            $table->string('special_info')->nullable();
            $table->foreignId('reseller_id')->nullable();
            $table->integer('reseller_commission');
            $table->integer('delivery_price');
            $table->integer('due_amount');
            $table->integer('paid_amount');
            $table->integer('product_price');
            $table->integer('total_price');
            $table->date('date')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();




            $table->foreign('reseller_id')->references('id')->on('resellers')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('booking_base');
    }
}
