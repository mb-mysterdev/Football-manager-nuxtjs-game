<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableDivisionUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('division_user', function (Blueprint $table) {
            $table->bigIncrements('division_user_id');
            $table->bigInteger('division_user_division')->unsigned();
            $table->foreign('division_user_division')
                ->references('division_id')
                ->on('divisions');
            $table->bigInteger('division_user_user')->unsigned();
            $table->foreign('division_user_user')
                ->references('id')
                ->on('users');
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
        Schema::dropIfExists('table_division_user');
    }
}
