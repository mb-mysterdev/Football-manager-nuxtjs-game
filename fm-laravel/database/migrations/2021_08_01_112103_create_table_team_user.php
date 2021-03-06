<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTeamUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_user', function (Blueprint $table) {
            $table->bigIncrements('tu_id');
            $table->bigInteger('tu_user')->unsigned();
            $table->bigInteger('tu_team')->unsigned();
            $table->foreign('tu_user')
                ->references('id')
                ->on('users');
            $table->foreign('tu_team')
                ->references('team_id')
                ->on('teams');
            $table->bigInteger('tu_budget')->default(0);
            $table->bigInteger('tu_power')->default(0);
            $table->bigInteger('tu_funds')->default(0);
            $table->bigInteger('tu_value')->default(0);
            $table->bigInteger('tu_stadium_capacity')->default(0);
            $table->bigInteger('tu_stadium_ticket_price')->default(0);
            $table->bigInteger('tu_number_supporters')->default(0);
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
        Schema::dropIfExists('table_team_user');
    }
}
