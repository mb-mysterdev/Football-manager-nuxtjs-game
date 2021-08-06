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
            $table->bigIncrements('fm_id');
            $table->bigInteger('fm_first_club')->unsigned();
            $table->foreign('fm_first_club')
            ->references('team_id')
                ->on('teams');
            $table->bigInteger('fm_second_club')->unsigned();
            $table->foreign('fm_second_club')
                ->references('team_id')
                ->on('teams');
            $table->bigInteger('fm_user')->unsigned();
            $table->foreign('fm_user')
                ->references('id')
                ->on('users');
            $table->integer('fm_result_fc')->nullable();
            $table->integer('fm_result_sc')->nullable();
            $table->dateTime('fm_date');
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
