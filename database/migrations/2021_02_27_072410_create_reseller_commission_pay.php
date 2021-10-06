<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResellerCommissionPay extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reseller_commission_pay', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_id', 100)->nullable();
            $table->date('date')->nullable();
            $table->string('amount')->nullable();
            $table->tinyInteger('transaction_type')->nullable()->comment('1=bank,2=mobile');
            $table->foreignId('created_by')->nullable();
            $table->foreignId('reseller_id')->nullable();
            $table->foreignId('transaction_id')->nullable();


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
        Schema::dropIfExists('reseller_commission_pay');
    }
}
