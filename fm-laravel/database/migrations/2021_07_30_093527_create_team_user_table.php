<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_user', function (Blueprint $table) {
            $table->bigIncrements('team_user_id');
            $table->unsignedBigInteger('team_user_user_id');
            $table->foreign('team_user_user_id')
                ->references('user_id')
                ->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('team_user_team_id');
            $table->foreign('team_user_team_id')
                ->references('team_id')
                ->on('teams')->onDelete('cascade');
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
        Schema::dropIfExists('team_user');
    }
}
