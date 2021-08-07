<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTakenFieldToTeamUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('team_user', function (Blueprint $table) {
            $table->bigInteger('tu_division')->unsigned();
            $table->foreign('tu_division')
                ->references('division_id')
                ->on('divisions');
            $table->boolean('tu_taken')->default(0);
            $table->boolean('tu_active')->default(0);
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
