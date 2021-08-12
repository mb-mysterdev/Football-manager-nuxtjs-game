<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserDivisionTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('user_division')->delete();

        \DB::table('user_division')->insert(array (
            0 =>
            array (
                'ud_id' => 1,
                'ud_user' => 1,
                'ud_division' => 1,
                'created_at' => new \DateTime(),
                'updated_at' => new \DateTime(),
            ),
        ));


    }
}
