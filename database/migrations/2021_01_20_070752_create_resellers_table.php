<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResellersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resellers', function (Blueprint $table) {
            $table->id();
            $table->string('name', 200);
            $table->string('company_name', 200);
            $table->string('interest', 200);
            $table->string('fb_page_link', 500)->nullable();
            $table->string('phone', 300);
            $table->string('email', 200)->unique();
            $table->string('password', 200);
            $table->text('address')->nullable();
            $table->string('image', 400)->nullable();
            $table->boolean('status')->default(1);
            $table->string('trade_licence', 1000)->nullable();
            $table->tinyInteger('type')->nullable();

            $table->foreignId('created_by')->nullable();
            $table->foreignId('updated_by')->nullable();

            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null');
            $table->rememberToken();
            $table->timestamp('email_verified_at')->nullable();
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
        Schema::dropIfExists('resellers');
    }
}
