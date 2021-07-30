<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersConfigTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_config', function (Blueprint $table) {
            $table->bigIncrements('user_config_id');
            $table->integer('user_config_club_number');
            $table->unsignedBigInteger('user_config_user');
            $table->foreign('user_config_user')->references('user_id')->on('users')
                ->onDelete('cascade');
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
        Schema::dropIfExists('users_config');
    }
}
