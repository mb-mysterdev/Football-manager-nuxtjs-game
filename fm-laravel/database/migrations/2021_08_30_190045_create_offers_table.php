<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->bigIncrements('offer_id');
            $table->integer('offer_team');
            $table->integer('offer_user');
            $table->integer('offer_how_match_again');
            $table->integer('offer_duration');
            $table->year('offer_start_year');
            $table->year('offer_end_year');
            $table->integer('offer_active');
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
        Schema::dropIfExists('offers');
    }
}
