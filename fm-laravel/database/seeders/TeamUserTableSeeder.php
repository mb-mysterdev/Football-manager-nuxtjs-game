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
                'created_at' => new \DateTime(),
                'updated_at' => new \DateTime(),
            ),
        ));


    }
}
