<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDivisionIdToTeams extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('division_teams', function (Blueprint $table) {
            $table->bigIncrements('division_team_id');
            $table->bigInteger('division_team_division')
                ->unsigned();
            $table->foreign('division_team_division')
                ->references('division_id')
                ->on('divisions');
            $table->bigInteger('division_team_team')
                ->unsigned();
            $table->foreign('division_team_team')
                ->references('team_id')
                ->on('teams');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('teams', function (Blueprint $table) {
            //
        });
    }
}
