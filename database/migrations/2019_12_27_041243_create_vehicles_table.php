<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('year_reg');
            $table->string('registration');
            $table->string('mileage');
            $table->string('engine_size');
            $table->string('colour');
            $table->integer('keepers');
            $table->string('body_style');
            $table->string('transmission');
            $table->string('fuel_type');
            $table->integer('insurance_group');
            $table->double('road_tax');
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
}
