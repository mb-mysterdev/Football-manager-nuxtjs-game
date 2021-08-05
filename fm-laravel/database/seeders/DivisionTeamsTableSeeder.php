<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DivisionTeamsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('division_teams')->delete();

        \DB::table('division_teams')->insert(array (
            0 =>
            array (
                'dt_id' => 1,
                'dt_division' => 1,
                'dt_team' => 1,
                'created_at' => new \DateTime(),
                'updated_at' => new \DateTime(),
            ),
        ));


    }
}
