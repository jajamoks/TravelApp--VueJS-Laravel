<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackingListItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packing_list_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('escape_packing_list_id')->unsigned();
            $table->string('name');
            $table->longText('description');
            $table->text('link')->nullable();
            $table->index(['id', 'escape_packing_list_id']);
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
        Schema::dropIfExists('packing_list_items');
    }
}
