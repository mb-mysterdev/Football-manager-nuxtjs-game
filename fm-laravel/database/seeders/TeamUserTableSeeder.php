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
                'tu_division' => 1,
                'tu_taken' => 1,
                'tu_active' => 1,
                'tu_pts'=>10,
                'tu_buts'=>8,
                'tu_ranking'=>10,
                'tu_year'=>2021,
                'created_at' => new \DateTime(),
                'updated_at' => new \DateTime(),
            ),
            1 =>
                array (
                    'tu_id' => 2,
                    'tu_user' => 1,
                    'tu_team' => 2,
                    'tu_budget' => 80,
                    'tu_power' => 85,
                    'tu_taken' => 0,
                    'tu_active' => 0,
                    'tu_division' => 1,
                    'tu_pts'=>10,
                    'tu_buts'=>8,
                    'tu_ranking'=>10,
                    'tu_year'=>2021,
                    'created_at' => new \DateTime(),
                    'updated_at' => new \DateTime(),
                ),
            2 =>
                array (
                    'tu_id' => 3,
                    'tu_user' => 1,
                    'tu_team' => 3,
                    'tu_budget' => 25,
                    'tu_power' => 60,
                    'tu_taken' => 1,
                    'tu_active' => 0,
                    'tu_division' => 2,
                    'tu_pts'=>10,
                    'tu_buts'=>8,
                    'tu_ranking'=>10,
                    'tu_year'=>2021,
                    'created_at' => new \DateTime(),
                    'updated_at' => new \DateTime(),
                ),
        ));


    }
}
