<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDivisionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_division', function (Blueprint $table) {
            $table->bigIncrements('ud_id');
            $table->bigInteger('ud_user')->unsigned();
            $table->foreign('ud_user')
                ->references('id')
                ->on('users');
            $table->bigInteger('ud_division')->unsigned();
            $table->foreign('ud_division')
                ->references('division_id')
                ->on('divisions');
            $table->boolean('ud_active')->default(0);
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
        Schema::dropIfExists('user_division');
    }
}
