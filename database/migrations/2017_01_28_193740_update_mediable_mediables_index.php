<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateMediableMediablesIndex extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mediable_mediables', function (Blueprint $table) {
            $table->dropUnique(['mediables_id', 'mediables_type']);
            $table->unique(['media_id','mediables_id', 'mediables_type']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mediable_mediables', function (Blueprint $table) {
            $table->dropUnique(['media_id','mediables_id', 'mediables_type']);
        });
    }
}
