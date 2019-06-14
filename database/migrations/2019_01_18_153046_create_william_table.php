<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWilliamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('william', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('height');
            $table->string('complexion');
            $table->integer('weight');
            $table->string('cloth');
            $table->integer('age');
            $table->integer('shoe_size');
            $table->string('disability');
            $table->string('shoe_color');
            $table->string('address');
            $table->string('email');
            $table->string('marital_status');
            $table->integer('phone');
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
        Schema::dropIfExists('william');
    }
}
