<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->index(['id', 'user_id']);
            $table->boolean('diet_has_restrictions')->default(false);
            $table->boolean('health_is_active')->default(false);
            $table->boolean('health_has_injuries')->default(false);
            $table->text('diet_restrictions')->nullable();
            $table->text('health_activities')->nullable();
            $table->text('health_injuries')->nullable();
            $table->text('goals')->nullable();
            $table->text('additional_info')->nullable();
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
        Schema::dropIfExists('user_profiles');
    }
}
