<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTeamsAndTeamUserToAddStaff extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('teams', function (Blueprint $table) {
            $table->unsignedBigInteger('team_coach');
            $table->foreign('team_coach')->references('staff_id')->on('staffs');

            $table->unsignedBigInteger('team_director');
            $table->foreign('team_director')->references('staff_id')->on('staffs');

            $table->unsignedBigInteger('team_trainer_center');
            $table->foreign('team_trainer_center')->references('staff_id')->on('staffs');
        });
        Schema::table('team_user', function (Blueprint $table) {
            $table->unsignedBigInteger('tu_coach');
            $table->foreign('tu_coach')->references('staff_id')->on('staffs');

            $table->unsignedBigInteger('tu_director');
            $table->foreign('tu_director')->references('staff_id')->on('staffs');

            $table->unsignedBigInteger('tu_trainer_center');
            $table->foreign('tu_trainer_center')->references('staff_id')->on('staffs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
