<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTeamsToAddEligibleLevelAndUpdateUsersToAddLevel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('teams', function (Blueprint $table) {
            $table->integer('team_min_level')->default(0);
            $table->integer('team_min_popularity')->default(0);
        });
        Schema::table('users', function (Blueprint $table) {
            $table->integer('level')->default(0);
            $table->integer('level_points')->default(0);

            $table->integer('popularity')->default(0);
            $table->integer('popularity_points')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('add_eligible_level_and_update_users_to_add_level', function (Blueprint $table) {
            //
        });
    }
}
