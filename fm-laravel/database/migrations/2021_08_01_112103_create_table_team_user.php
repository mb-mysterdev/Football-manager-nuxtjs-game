<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTeamUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_user', function (Blueprint $table) {
            $table->bigIncrements('team_user_id');
            $table->bigInteger('team_user_user_id')->unsigned();
            $table->bigInteger('team_user_team_id')->unsigned();
            $table->foreign('team_user_user_id')
                ->references('id')
                ->on('users');
            $table->foreign('team_user_team_id')
                ->references('team_id')
                ->on('teams');
            $table->bigInteger('team_user_budget');
            $table->bigInteger('team_user_power');
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
        Schema::dropIfExists('table_team_user');
    }
}
