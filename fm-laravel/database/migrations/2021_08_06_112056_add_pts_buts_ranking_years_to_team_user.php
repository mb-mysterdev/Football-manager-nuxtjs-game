<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPtsButsRankingYearsToTeamUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('team_user', function (Blueprint $table) {
            $table->integer('tu_pts')->nullable();
            $table->integer('tu_j')->nullable();
            $table->integer('tu_g')->nullable();
            $table->integer('tu_n')->nullable();
            $table->integer('tu_p')->nullable();
            $table->integer('tu_bp')->nullable();
            $table->integer('tu_bc')->nullable();
            $table->integer('tu_db')->nullable();
            $table->integer('tu_ranking')->nullable();
            $table->year('tu_year');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('team_user', function (Blueprint $table) {
            //
        });
    }
}
