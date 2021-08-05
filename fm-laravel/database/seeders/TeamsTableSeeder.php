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
                'created_at' => new \DateTime(),
                'updated_at' => new \DateTime(),
                'team_power' => 80,
                'team_budget' => 60,
                'team_objective' => '"{}"',
            ),
        ));


    }
}
