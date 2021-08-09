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
            $table->integer('tu_pts')->default(0);
            $table->integer('tu_j')->default(0);
            $table->integer('tu_g')->default(0);
            $table->integer('tu_n')->default(0);
            $table->integer('tu_p')->default(0);
            $table->integer('tu_bp')->default(0);
            $table->integer('tu_bc')->default(0);
            $table->integer('tu_db')->default(0);
            $table->integer('tu_ranking')->nullable();
            $table->year('tu_year')->default(Date('Y'));
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
