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
                'created_at' => '2021-08-30 14:49:45',
                'updated_at' => '2021-08-30 14:49:45',
                'team_power' => 95,
                'team_budget' => 60,
                'team_objective' => '"{}"',
                'team_division' => 1,
                'team_logo' => 'https://www.psg.fr/img/DefaultOpenGraphImage.jpg?2019',
                'team_country' => 1,
                'team_min_level' => 20,
                'team_min_popularity' => 5,
            ),
            1 => 
            array (
                'team_id' => 2,
                'team_name' => 'OM',
                'created_at' => '2021-08-30 14:49:45',
                'updated_at' => '2021-08-30 14:49:45',
                'team_power' => 85,
                'team_budget' => 50,
                'team_objective' => '"{}"',
                'team_division' => 1,
                'team_logo' => 'https://upload.wikimedia.org/wikipedia/fr/thumb/4/43/Logo_Olympique_de_Marseille.svg/1200px-Logo_Olympique_de_Marseille.svg.png',
                'team_country' => 1,
                'team_min_level' => 5,
                'team_min_popularity' => 1,
            ),
            2 => 
            array (
                'team_id' => 3,
                'team_name' => 'Nice',
                'created_at' => '2021-08-30 14:49:45',
                'updated_at' => '2021-08-30 14:49:45',
                'team_power' => 75,
                'team_budget' => 50,
                'team_objective' => '"{}"',
                'team_division' => 1,
                'team_logo' => '',
                'team_country' => 1,
                'team_min_level' => 3,
                'team_min_popularity' => 1,
            ),
            3 => 
            array (
                'team_id' => 4,
                'team_name' => 'Sarcelles',
                'created_at' => '2021-08-30 14:49:45',
                'updated_at' => '2021-08-30 14:49:45',
                'team_power' => 40,
                'team_budget' => 50,
                'team_objective' => '"{}"',
                'team_division' => 2,
                'team_logo' => '',
                'team_country' => 1,
                'team_min_level' => 1,
                'team_min_popularity' => 1,
            ),
            4 => 
            array (
                'team_id' => 5,
                'team_name' => 'Rennes',
                'created_at' => '2021-08-30 14:49:45',
                'updated_at' => '2021-08-30 14:49:45',
                'team_power' => 68,
                'team_budget' => 50,
                'team_objective' => '"{}"',
                'team_division' => 2,
                'team_logo' => '',
                'team_country' => 1,
                'team_min_level' => 2,
                'team_min_popularity' => 1,
            ),
            5 => 
            array (
                'team_id' => 6,
                'team_name' => 'ESS',
                'created_at' => '2021-08-30 14:49:45',
                'updated_at' => '2021-08-30 14:49:45',
                'team_power' => 68,
                'team_budget' => 50,
                'team_objective' => '"{}"',
                'team_division' => 3,
                'team_logo' => '',
                'team_country' => 2,
                'team_min_level' => 2,
                'team_min_popularity' => 1,
            ),
            6 => 
            array (
                'team_id' => 7,
                'team_name' => 'EST',
                'created_at' => '2021-08-30 14:49:45',
                'updated_at' => '2021-08-30 14:49:45',
                'team_power' => 68,
                'team_budget' => 50,
                'team_objective' => '"{}"',
                'team_division' => 3,
                'team_logo' => '',
                'team_country' => 2,
                'team_min_level' => 2,
                'team_min_popularity' => 1,
            ),
            7 => 
            array (
                'team_id' => 8,
                'team_name' => 'CSS',
                'created_at' => '2021-08-30 14:49:45',
                'updated_at' => '2021-08-30 14:49:45',
                'team_power' => 68,
                'team_budget' => 50,
                'team_objective' => '"{}"',
                'team_division' => 3,
                'team_logo' => '',
                'team_country' => 2,
                'team_min_level' => 2,
                'team_min_popularity' => 1,
            ),
        ));
        
        
    }
}