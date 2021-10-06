<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionBank extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_bank', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reseller_id');
            $table->string('bank_name');
            $table->string('account_number');
            $table->string('accountant_name');
            $table->string('branch_name');
            $table->string('routing_number');


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
        Schema::dropIfExists('transaction_bank');
    }
}
