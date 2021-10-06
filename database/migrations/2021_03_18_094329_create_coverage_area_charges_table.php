<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoverageAreaChargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coverage_area_charges', function (Blueprint $table) {
            $table->id();
            $table->foreignId('coverage_id')->constrained('inport_exports')->cascadeOnDelete();
            $table->foreignId('type_id')->constrained('charge_types')->cascadeOnDelete();
            $table->integer('cost')->nullable();
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
        Schema::dropIfExists('coverage_area_charges');
    }
}
