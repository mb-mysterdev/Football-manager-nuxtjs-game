<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FootballMatchesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('football_matches')->delete();
        
        \DB::table('football_matches')->insert(array (
            0 => 
            array (
                'fm_id' => 1,
                'fm_first_club' => 2,
                'fm_second_club' => 1,
                'fm_user' => 1,
                'fm_date' => '2021-08-05 14:10:48',
                'created_at' => NULL,
                'updated_at' => NULL,
                'fm_year' => 2021,
                'fm_result_fc' => 1,
                'fm_result_sc' => 2,
            ),
            1 => 
            array (
                'fm_id' => 2,
                'fm_first_club' => 1,
                'fm_second_club' => 4,
                'fm_user' => 1,
                'fm_date' => '2021-08-06 14:07:48',
                'created_at' => NULL,
                'updated_at' => NULL,
                'fm_year' => 2021,
                'fm_result_fc' => NULL,
                'fm_result_sc' => NULL,
            ),
            2 => 
            array (
                'fm_id' => 3,
                'fm_first_club' => 2,
                'fm_second_club' => 4,
                'fm_user' => 1,
                'fm_date' => '2021-08-06 14:07:48',
                'created_at' => NULL,
                'updated_at' => NULL,
                'fm_year' => 2021,
                'fm_result_fc' => NULL,
                'fm_result_sc' => NULL,
            ),
            3 => 
            array (
                'fm_id' => 4,
                'fm_first_club' => 1,
                'fm_second_club' => 4,
                'fm_user' => 1,
                'fm_date' => '2021-08-06 14:07:48',
                'created_at' => NULL,
                'updated_at' => NULL,
                'fm_year' => 2020,
                'fm_result_fc' => NULL,
                'fm_result_sc' => NULL,
            ),
        ));
        
        
    }
}