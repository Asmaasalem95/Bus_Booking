<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->foreignId('start_station_id')->constrained('bus_station')->cascadeOnDelete();
            $table->foreignId('final_station_id')->constrained('bus_station')->cascadeOnDelete();        //    $table->foreign('from','bus_stop_id')->references('id')->on('bus_stops');
          //  $table->unsignedInteger('to');
          //  $table->foreign('to','bus_stop_id')->references('id')->on('bus_stops');

            $table->dateTime('departure_time');
            $table->dateTime('arrival_time');
            $table->double('price');
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
        Schema::dropIfExists('buses');
    }
}
