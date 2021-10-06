<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_product', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id');
            $table->foreignID('category_id');
            $table->foreignID('subcategory_id');
            $table->foreignID('product_id');
            $table->string('quantity', 400);
            $table->string('product_size', 200);
            $table->integer('price');
            $table->date('date')->nullable();
            $table->timestamps();

            $table->foreign('booking_id')->references('id')->on('booking_base')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('subcategory_id')->references('id')->on('product_subcategoty')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('booking_product');
    }
}
