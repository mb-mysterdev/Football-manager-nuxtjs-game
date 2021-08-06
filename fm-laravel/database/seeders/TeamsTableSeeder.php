<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TeamsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('teams')->delete();

        \DB::table('teams')->insert(array (
            0 =>
            array (
                'team_id' => 1,
                'team_name' => 'PSG',
                'team_power' => 80,
                'team_budget' => 60,
                'team_objective' => '"{}"',
                'team_division' => 1,
                'created_at' => new \DateTime(),
                'updated_at' => new \DateTime(),
            ),
            1 =>
                array (
                    'team_id' => 2,
                    'team_name' => 'OM',
                    'team_power' => 40,
                    'team_budget' => 50,
                    'team_objective' => '"{}"',
                    'team_division' => 1,
                    'created_at' => new \DateTime(),
                    'updated_at' => new \DateTime(),
                ),
            2 =>
                array (
                    'team_id' => 3,
                    'team_name' => 'Nice',
                    'team_power' => 40,
                    'team_budget' => 50,
                    'team_objective' => '"{}"',
                    'team_division' => 1,
                    'created_at' => new \DateTime(),
                    'updated_at' => new \DateTime(),
                ),
        ));


    }
}
