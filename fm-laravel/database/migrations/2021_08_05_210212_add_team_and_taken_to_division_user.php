<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTeamAndTakenToDivisionUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('division_user', function (Blueprint $table) {
            $table->boolean('du_taken');
            $table->bigInteger('du_team')->unsigned();
            $table->foreign('du_team')
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
        Schema::table('division_user', function (Blueprint $table) {
            //
        });
    }
}
