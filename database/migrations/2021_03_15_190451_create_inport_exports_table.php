<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInportExportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inport_exports', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('city_id')->nullable();
            // $table->foreignId('area_id')->nullable();
            $table->foreignId('city_id')->constrained('city_models')->cascadeOnDelete();
            $table->foreignId('area_id')->constrained('recipient_zone')->cascadeOnDelete();
            $table->string('post_code')->nullable();
            $table->boolean('home_delivery')->default(0)->nullable();
            $table->boolean('lockdown')->default(0)->nullable();
            $table->integer('charge_1kg')->nullable();
            $table->integer('charge_2kg')->nullable();
            $table->integer('charge_3kg')->nullable();
            $table->decimal('cod_charge', 8, 2)->nullable();
            $table->boolean('status')->default(1)->nullable();
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
        Schema::dropIfExists('inport_exports');
    }
}
