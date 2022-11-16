<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('brand');
            $table->integer('vehicle_year');
            $table->integer('kilometers');
            $table->string('city');
            $table->string('type');
            $table->integer('price');
            $table->string('image');
            $table->string('description')->nullable();
            $table->string('contact_name');
            $table->string('contact_phone');
            $table->string('contact_mail');

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
        Schema::dropIfExists('vehicles');
    }
};
