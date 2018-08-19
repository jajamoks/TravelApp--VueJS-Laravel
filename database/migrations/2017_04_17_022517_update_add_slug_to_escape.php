<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateAddSlugToEscape extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('escapes', function (Blueprint $table) {
            $table->string('slug')->default('default_value');
        });
    }

    /**
     * Reverse migration
     *
     * @return void
     */
    public function down()
    {
        Schema::table('escapes', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
}
