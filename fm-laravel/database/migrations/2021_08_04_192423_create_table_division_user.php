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
            $table->bigIncrements('du_id');
            $table->bigInteger('du_division')->unsigned();
            $table->foreign('du_division')
                ->references('division_id')
                ->on('divisions');
            $table->bigInteger('du_user')->unsigned();
            $table->foreign('du_user')
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
