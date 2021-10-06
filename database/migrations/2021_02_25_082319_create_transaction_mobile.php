<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionMobile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_mobile', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reseller_id');
            $table->string('mobile_number');
            $table->string('account_type');


            $table->foreign('reseller_id')->references('id')->on('resellers')->onDelete('cascade');
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
        Schema::dropIfExists('transaction_mobile');
    }
}
