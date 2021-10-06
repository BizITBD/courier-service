<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMegaMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mega_menus', function (Blueprint $table) {
            $table->id();
            $table->string('title', 50)->nullable();
            $table->string('subtitle', 100)->nullable();
            $table->string('header', 50)->nullable();
            $table->string('icon', 500)->nullable();
            $table->string('banner', 500)->nullable();
            $table->longText('description')->nullable();
            $table->string('slug', 200);
            $table->foreignId('created_by')->constrained('users')->cascadeOnDelete();
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('mega_menus');
    }
}
