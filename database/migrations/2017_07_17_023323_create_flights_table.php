<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('reservation_id')->unsigned()->unique();
            $table->dateTime('arrival_date');
            $table->dateTime('departure_date');
            $table->text('arrival_airline');
            $table->text('arrival_flight_number');
            $table->text('departure_airline');
            $table->text('departure_flight_number');
            $table->text('departure_airport');
            $table->text('arrival_airport');
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
        Schema::dropIfExists('flights');
    }
}
