<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StaffsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('staffs')->delete();
        
        \DB::table('staffs')->insert(array (
            0 => 
            array (
                'staff_id' => 1,
                'staff_power' => 80,
                'staff_experience' => 5,
                'staff_salary' => 12000,
                'staff_value' => 1000000,
                'staff_progression_for_team' => 10,
                'staff_type' => 'coach',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'staff_id' => 2,
                'staff_power' => 40,
                'staff_experience' => 2,
                'staff_salary' => 11500,
                'staff_value' => 150000,
                'staff_progression_for_team' => 15,
                'staff_type' => 'director',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'staff_id' => 3,
                'staff_power' => 30,
                'staff_experience' => 2,
                'staff_salary' => 11000,
                'staff_value' => 120000,
                'staff_progression_for_team' => 30,
                'staff_type' => 'trainer_center',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}