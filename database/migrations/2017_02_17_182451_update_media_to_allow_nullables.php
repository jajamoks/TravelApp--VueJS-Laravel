<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateMediaToAllowNullables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mediable_media', function (Blueprint $table) {
            $table->string('public_id')->nullable()->change();
            $table->integer('version')->nullable()->change();
            $table->string('signature')->nullable()->change();
            $table->smallInteger('width')->nullable()->change();
            $table->smallInteger('height')->nullable()->change();
            $table->string('format', 20)->nullable()->change();
            $table->bigInteger('bytes')->nullable()->change();
            $table->string('type', 20)->nullable()->change();
            $table->string('etag')->nullable()->change();
            $table->string('url')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mediable_media');
    }
}
