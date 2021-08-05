<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DivisionUserTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('division_user')->delete();

        \DB::table('division_user')->insert(array (
            0 =>
            array (
                'du_id' => 1,
                'du_division' => 1,
                'du_user' => 1,
                'du_taken' => 1,
                'du_team' => 1,
                'created_at' => new \DateTime(),
                'updated_at' => new \DateTime(),
            ),
        ));


    }
}
