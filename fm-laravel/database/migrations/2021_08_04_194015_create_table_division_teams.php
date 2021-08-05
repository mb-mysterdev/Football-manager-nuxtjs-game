<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableDivisionTeams extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('division_teams', function (Blueprint $table) {
            $table->bigIncrements('dt_id');
            $table->bigInteger('dt_division')
                ->unsigned();
            $table->foreign('dt_division')
                ->references('division_id')
                ->on('divisions');
            $table->bigInteger('dt_team')
                ->unsigned();
            $table->foreign('dt_team')
                ->references('team_id')
                ->on('teams');
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
        Schema::table('teams', function (Blueprint $table) {
            //
        });
    }
}
