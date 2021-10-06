<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMerchantPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchant_payments', function (Blueprint $table) {
            $table->id();
            $table->string('booking_id', 50)->nullable();
            $table->date('date');
            $table->decimal('amount', 8, 2)->nullable();
            $table->tinyInteger('transaction_type')->nullable()->comment('1=bank,2=mobile');
            $table->foreignId('created_by')->nullable();
            $table->foreignId('reseller_id')->nullable();
            $table->foreignId('transaction_id')->nullable();
            $table->timestamps();


            $table->foreign('created_by')->references('id')->on('resellers');
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
        Schema::dropIfExists('merchant_payments');
    }
}
