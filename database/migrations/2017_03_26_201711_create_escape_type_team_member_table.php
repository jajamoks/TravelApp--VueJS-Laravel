<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEscapeTypeTeamMemberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('escape_type_team_member', function (Blueprint $table) {
            $table->increments('id');
            $table->smallInteger('escape_type_id')->unsigned();
            $table->smallInteger('team_member_id')->unsigned();
            $table->tinyInteger('order')->unsigned();
            $table->index(['escape_type_id', 'team_member_id']);
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
        Schema::dropIfExists('escape_type_team_member');
    }
}
