<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ContinentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('continents')->delete();
        
        \DB::table('continents')->insert(array (
            0 => 
            array (
                'continent_id' => 1,
                'continent_name' => 'Afrique',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'continent_id' => 2,
                'continent_name' => 'Europe',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'continent_id' => 3,
                'continent_name' => 'Asie',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'continent_id' => 4,
                'continent_name' => 'Amérique',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'continent_id' => 5,
                'continent_name' => 'Océanie ',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}