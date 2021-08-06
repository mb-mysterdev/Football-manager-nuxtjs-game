<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TeamUserTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('team_user')->delete();
        
        \DB::table('team_user')->insert(array (
            0 => 
            array (
                'tu_id' => 1,
                'tu_user' => 1,
                'tu_team' => 1,
                'tu_budget' => 80,
                'tu_power' => 85,
                'created_at' => '2021-08-06 21:28:31',
                'updated_at' => '2021-08-06 21:28:31',
                'tu_division' => 1,
                'tu_taken' => 1,
                'tu_active' => 1,
                'tu_pts' => 4,
                'tu_j' => 2,
                'tu_g' => 1,
                'tu_n' => 1,
                'tu_p' => 0,
                'tu_bp' => 3,
                'tu_bc' => 1,
                'tu_db' => 2,
                'tu_ranking' => 1,
                'tu_year' => 2021,
            ),
            1 => 
            array (
                'tu_id' => 2,
                'tu_user' => 1,
                'tu_team' => 2,
                'tu_budget' => 80,
                'tu_power' => 85,
                'created_at' => '2021-08-06 21:28:31',
                'updated_at' => '2021-08-06 21:28:31',
                'tu_division' => 1,
                'tu_taken' => 0,
                'tu_active' => 0,
                'tu_pts' => 4,
                'tu_j' => 2,
                'tu_g' => 1,
                'tu_n' => 1,
                'tu_p' => 0,
                'tu_bp' => 2,
                'tu_bc' => 1,
                'tu_db' => 1,
                'tu_ranking' => 2,
                'tu_year' => 2021,
            ),
            2 => 
            array (
                'tu_id' => 3,
                'tu_user' => 1,
                'tu_team' => 3,
                'tu_budget' => 25,
                'tu_power' => 60,
                'created_at' => '2021-08-06 21:28:31',
                'updated_at' => '2021-08-06 21:28:31',
                'tu_division' => 2,
                'tu_taken' => 1,
                'tu_active' => 0,
                'tu_pts' => 10,
                'tu_j' => NULL,
                'tu_g' => NULL,
                'tu_n' => NULL,
                'tu_p' => NULL,
                'tu_bp' => NULL,
                'tu_bc' => NULL,
                'tu_db' => 8,
                'tu_ranking' => 10,
                'tu_year' => 2020,
            ),
            3 => 
            array (
                'tu_id' => 4,
                'tu_user' => 1,
                'tu_team' => 4,
                'tu_budget' => 25,
                'tu_power' => 60,
                'created_at' => '2021-08-06 21:28:31',
                'updated_at' => '2021-08-06 21:28:31',
                'tu_division' => 1,
                'tu_taken' => 0,
                'tu_active' => 1,
                'tu_pts' => 2,
                'tu_j' => 2,
                'tu_g' => 0,
                'tu_n' => 2,
                'tu_p' => 0,
                'tu_bp' => 4,
                'tu_bc' => 4,
                'tu_db' => 0,
                'tu_ranking' => 3,
                'tu_year' => 2021,
            ),
        ));
        
        
    }
}