<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateEscapeType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('escape_types', function (Blueprint $table) {
            $table->longText('wellness_summary')->nullable();
            $table->longText('nutrition_summary')->nullable();
            $table->longText('home_summary')->nullable();
            $table->longText('unique_summary')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
