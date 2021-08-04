<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFootballMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('football_matches', function (Blueprint $table) {
            $table->bigIncrements('football_match_id');
            $table->bigInteger('football_match_first_club')->unsigned();
            $table->foreign('football_match_first_club')
            ->references('team_id')
                ->on('teams');
            $table->bigInteger('football_match_second_club')->unsigned();
            $table->foreign('football_match_second_club')
                ->references('team_id')
                ->on('teams');
            $table->bigInteger('football_match_user')->unsigned();
            $table->foreign('football_match_user')
                ->references('id')
                ->on('users');
            $table->dateTime('football_match_date');
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
        Schema::dropIfExists('football_matches');
    }
}
