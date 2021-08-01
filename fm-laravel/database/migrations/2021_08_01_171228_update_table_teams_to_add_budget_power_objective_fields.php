<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTableTeamsToAddBudgetPowerObjectiveFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('teams', function (Blueprint $table) {
            $table->bigInteger('team_power');
            $table->bigInteger('team_budget');
            $table->bigInteger('team_effective');
            $table->json('team_objective');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('add_budget_power_objective_fields', function (Blueprint $table) {
            //
        });
    }
}
