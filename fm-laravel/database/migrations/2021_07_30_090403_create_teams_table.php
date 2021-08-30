<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->bigIncrements('team_id');
            $table->string('team_name');
            $table->bigInteger('team_funds')->default(0);
            $table->bigInteger('team_value')->default(0);
            $table->bigInteger('team_stadium_capacity')->default(0);
            $table->bigInteger('team_stadium_ticket_price')->default(0);
            $table->bigInteger('team_number_supporters')->default(0);
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
        Schema::dropIfExists('team');
    }
}
