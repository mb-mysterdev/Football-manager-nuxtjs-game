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
                'tu_pts' => 0,
                'tu_j' => 0,
                'tu_g' => 0,
                'tu_n' => 0,
                'tu_p' => 0,
                'tu_bp' => 0,
                'tu_bc' => 0,
                'tu_db' => 0,
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
                'tu_pts' => 0,
                'tu_j' => 0,
                'tu_g' => 0,
                'tu_n' => 0,
                'tu_p' => 0,
                'tu_bp' => 0,
                'tu_bc' => 0,
                'tu_db' => 0,
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
                'tu_pts' => 0,
                'tu_j' => 0,
                'tu_g' => 0,
                'tu_n' => 0,
                'tu_p' => 0,
                'tu_bp' => 0,
                'tu_bc' => 0,
                'tu_db' => 0,
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
                'tu_pts' => 0,
                'tu_j' => 0,
                'tu_g' => 0,
                'tu_n' => 0,
                'tu_p' => 0,
                'tu_bp' => 0,
                'tu_bc' => 0,
                'tu_db' => 0,
                'tu_ranking' => 3,
                'tu_year' => 2021,
            ),
        ));


    }
}
