<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReadingListItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reading_list_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('escape_reading_list_id')->unsigned();
            $table->string('name');
            $table->longText('description')->nullable();
            $table->text('link')->nullable();
            $table->index(['id', 'escape_reading_list_id'])->change();
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
        Schema::dropIfExists('reading_list_items');
    }
}
