<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEscapeFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('escape_features', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('order')->unsigned();
            $table->text('content');
            $table->integer('escape_type_id')->unsigned();
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
        Schema::dropIfExists('escape_features');
    }
}
