<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldToResellerCommissionPayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reseller_commission_pay', function (Blueprint $table) {

            $table->foreignId('base_id')->nullable()->constrained('reseller_pay_bases')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reseller_commission_pay', function (Blueprint $table) {
            //
        });
    }
}
