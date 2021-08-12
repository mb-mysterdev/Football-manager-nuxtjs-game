<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDivisionToFootballMatches extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('football_matches', function (Blueprint $table) {
            $table->bigInteger('fm_division')
                ->unsigned();
            $table->foreign('fm_division')
                ->references('division_id')
                ->on('divisions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('football_matches', function (Blueprint $table) {
            //
        });
    }
}
