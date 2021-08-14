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
                'country_picture' => 'https://x.cloudsdata.net/1p/images/products/product_info/534d4336527a0_Image00001.jpg',
                'created_at' => new \DateTime(),
                'updated_at' => new \DateTime(),
            ),
            1 =>
                array (
                    'country_id' => 2,
                    'country_name' => 'Tunisie',
                    'country_picture' => 'https://www.egypttoday.com/siteimages/Larg/20210204010016016.jpg',
                    'created_at' => new \DateTime(),
                    'updated_at' => new \DateTime(),
                ),
        ));


    }
}
