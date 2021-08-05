<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->delete();

        \DB::table('users')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'BestManager',
                'email' => 'bestmanager@fm.fr',
                'password' => '$2y$10$DgDja2hR97CEs0Ce8djm/.xS1cABGW2bzh0FDUqOjiAoakgoGSkbG',
                'created_at' => new \DateTime(),
                'updated_at' => new \DateTime(),
            ),
        ));
    }
}
