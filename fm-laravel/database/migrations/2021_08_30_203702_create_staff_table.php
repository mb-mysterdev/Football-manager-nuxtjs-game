<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staffs', function (Blueprint $table) {
            $table->bigIncrements('staff_id');
            $table->bigInteger('staff_power')->default(0);
            $table->bigInteger('staff_experience')->default(0);
            $table->bigInteger('staff_salary')->default(0);
            $table->bigInteger('staff_value')->default(0);
            $table->bigInteger('staff_progression_for_team')->default(0);
            $table->enum('staff_type',[1 => 'coach',2 => 'director',3 => 'trainer_center']);
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
        Schema::dropIfExists('staff');
    }
}
