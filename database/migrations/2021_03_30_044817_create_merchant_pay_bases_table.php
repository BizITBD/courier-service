<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMerchantPayBasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchant_pay_bases', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->foreignId('merchant_id')->constrained('resellers')->cascadeOnDelete();
            $table->decimal('total_Amount', 8, 2)->nullable();
            $table->foreignId('created_by')->nullable();
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
        Schema::dropIfExists('merchant_pay_bases');
    }
}
