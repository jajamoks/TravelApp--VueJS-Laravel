<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediablesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mediable_media', function (Blueprint $table) {
            $table->increments('id');
            $table->string('public_id');
            $table->integer('version');
            $table->string('signature');
            $table->smallInteger('width');
            $table->smallInteger('height');
            $table->string('format', 20);
            $table->string('resource_type', 20);
            $table->bigInteger('bytes');
            $table->string('type', 20);
            $table->string('etag');
            $table->string('url');
            $table->string('secure_url');
            $table->string('original_filename')->nullable();
            $table->timestamps();
        });

        Schema::create('mediable_mediables', function (Blueprint $table) {
            $table->unsignedInteger('media_id');
            $table->integer('mediables_id');
            $table->string('mediables_type');
            $table->string('type')->nullable();
            $table->tinyInteger('order')->nullable();
            $table->unique(['mediables_id', 'mediables_type']);
            $table->index(['mediables_id', 'mediables_type']);
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
        Schema::dropIfExists('mediable_mediables');
        Schema::dropIfExists('mediable_media');
    }
}
