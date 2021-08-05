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
                'created_at' => new \DateTime(),
                'updated_at' => new \DateTime(),
            ),
        ));


    }
}
