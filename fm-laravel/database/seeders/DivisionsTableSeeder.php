<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DivisionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('divisions')->delete();

        \DB::table('divisions')->insert(array (
            0 =>
            array (
                'division_id' => 1,
                'division_name' => 'Ligue1',
                'division_country' => 1,
                'created_at' => new \DateTime(),
                'updated_at' => new \DateTime(),
            ),
            1 =>
                array (
                    'division_id' => 2,
                    'division_name' => 'Ligue2',
                    'division_country' => 1,
                    'created_at' => new \DateTime(),
                    'updated_at' => new \DateTime(),
                ),
            2 =>
                array (
                    'division_id' => 3,
                    'division_name' => 'Championnat de Tunisie',
                    'division_country' => 2,
                    'created_at' => new \DateTime(),
                    'updated_at' => new \DateTime(),
                ),
        ));


    }
}
