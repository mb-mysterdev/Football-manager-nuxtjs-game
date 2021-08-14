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
                'team_power' => 95,
                'team_budget' => 60,
                'team_objective' => '"{}"',
                'team_division' => 1,
                'team_logo' => 'https://www.psg.fr/img/DefaultOpenGraphImage.jpg?2019',
                'team_country' => 1,
                'team_min_level' => 20,
                'team_min_popularity' => 5,
                'created_at' => new \DateTime(),
                'updated_at' => new \DateTime(),
            ),
            1 =>
                array (
                    'team_id' => 2,
                    'team_name' => 'OM',
                    'team_power' => 85,
                    'team_budget' => 50,
                    'team_objective' => '"{}"',
                    'team_division' => 1,
                    'team_country' => 1,
                    'team_min_level' => 5,
                    'team_min_popularity' => 1,
                    'team_logo' => 'https://upload.wikimedia.org/wikipedia/fr/thumb/4/43/Logo_Olympique_de_Marseille.svg/1200px-Logo_Olympique_de_Marseille.svg.png',
                    'created_at' => new \DateTime(),
                    'updated_at' => new \DateTime(),
                ),
            2 =>
                array (
                    'team_id' => 3,
                    'team_name' => 'Nice',
                    'team_power' => 75,
                    'team_budget' => 50,
                    'team_objective' => '"{}"',
                    'team_division' => 1,
                    'team_country' => 1,
                    'team_logo' => '',
                    'team_min_level' => 3,
                    'team_min_popularity' => 1,
                    'created_at' => new \DateTime(),
                    'updated_at' => new \DateTime(),
                ),
            3 =>
                array (
                    'team_id' => 4,
                    'team_name' => 'Sarcelles',
                    'team_power' => 40,
                    'team_budget' => 50,
                    'team_objective' => '"{}"',
                    'team_division' => 2,
                    'team_country' => 1,
                    'team_logo' => '',
                    'team_min_level' => 1,
                    'team_min_popularity' => 1,
                    'created_at' => new \DateTime(),
                    'updated_at' => new \DateTime(),
                ),
            4 =>
                array (
                    'team_id' => 5,
                    'team_name' => 'Rennes',
                    'team_power' => 68,
                    'team_budget' => 50,
                    'team_objective' => '"{}"',
                    'team_division' => 2,
                    'team_country' => 1,
                    'team_logo' => '',
                    'team_min_level' => 2,
                    'team_min_popularity' => 1,
                    'created_at' => new \DateTime(),
                    'updated_at' => new \DateTime(),
                ),
            5 =>
                array (
                    'team_id' => 6,
                    'team_name' => 'ESS',
                    'team_power' => 68,
                    'team_budget' => 50,
                    'team_objective' => '"{}"',
                    'team_division' => 3,
                    'team_country' => 2,
                    'team_logo' => '',
                    'team_min_level' => 2,
                    'team_min_popularity' => 1,
                    'created_at' => new \DateTime(),
                    'updated_at' => new \DateTime(),
                ),
        ));


    }
}
