<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('countries')->delete();

        \DB::table('countries')->insert(array (
            0 =>
            array (
                'country_id' => 1,
                'country_name' => 'France',
                'created_at' => new \DateTime(),
                'updated_at' => new \DateTime(),
            ),
            1 =>
                array (
                    'country_id' => 2,
                    'country_name' => 'Tunisie',
                    'created_at' => new \DateTime(),
                    'updated_at' => new \DateTime(),
                ),
        ));


    }
}
