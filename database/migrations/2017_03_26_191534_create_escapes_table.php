<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEscapesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('escapes', function (Blueprint $table) {
            $table->increments('id');
            $table->smallInteger('single_rooms')->unsigned();
            $table->smallInteger('shared_rooms')->unsigned();
            $table->integer('escape_type_id')->unsigned();
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('deposit_amount')->unsigned();
            $table->integer('shared_rate')->unsigned();
            $table->integer('single_rate')->unsigned();
            $table->index('escape_type_id');
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
        Schema::dropIfExists('escapes');
    }
}
