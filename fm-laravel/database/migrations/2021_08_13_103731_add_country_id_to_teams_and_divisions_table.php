<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCountryIdToTeamsAndDivisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('teams', function (Blueprint $table) {
            $table->bigInteger('team_country')->unsigned();
            $table->foreign('team_country')->references('country_id')->on('countries');
        });
        Schema::table('divisions', function (Blueprint $table) {
            $table->bigInteger('division_country')->unsigned();
            $table->foreign('division_country')->references('country_id')->on('countries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('teams_and_divisions', function (Blueprint $table) {
            //
        });
    }
}
