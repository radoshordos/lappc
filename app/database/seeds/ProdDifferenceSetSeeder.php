<?php

class ProdDifferenceSetSeeder extends Seeder
{

    public function run()
    {

        $prod2difference2set = [
            ['pds_id' => '40', 'pds_visible' => '1', 'pds_name' => 'Rozměr', 'pds_sortby' => 'pdv_id'],
            ['pds_id' => '50', 'pds_visible' => '1', 'pds_name' => 'Hrubost', 'pds_sortby' => 'pdv_id'],
            ['pds_id' => '70', 'pds_visible' => '1', 'pds_name' => 'Délka', 'pds_sortby' => 'pdv_id']
        ];


        DB::table('prod_difference_set')->delete();

        DB::table('prod_difference_set')->insert([
            'id'   => 1,
            'name' => '[A/N]'
        ]);

        DB::table('prod_difference_set')->insert([
            'id'   => 10,
            'name' => 'Velikost'
        ]);

        DB::table('prod_difference_set')->insert([
            'id'   => 20,
            'name' => 'Barva'
        ]);

        foreach ($prod2difference2set as $row) {

            DB::table('prod_difference_set')->insert([
                'id'     => $row['pds_id'],
                'name'   => $row['pds_name']
            ]);
        }

    }
}