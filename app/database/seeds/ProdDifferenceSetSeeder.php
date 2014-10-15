<?php

class ProdDifferenceSetSeeder extends Seeder
{

    public function run()
    {
        $prod2difference2set = [
            ['pds_id' => '1', 'pds_visible' => '1', 'pds_name' => '[A/N]', 'pds_sortby' => 'id'],
            ['pds_id' => '11', 'pds_visible' => '1', 'pds_name' => 'Velikost', 'pds_sortby' => 'id'],
            ['pds_id' => '13', 'pds_visible' => '1', 'pds_name' => 'Barva', 'pds_sortby' => 'name'],
            ['pds_id' => '17', 'pds_visible' => '1', 'pds_name' => 'Rozměr', 'pds_sortby' => 'id'],
            ['pds_id' => '23', 'pds_visible' => '1', 'pds_name' => 'Délka', 'pds_sortby' => 'id'],
        ];

        DB::table('prod_difference_set')->delete();

        foreach ($prod2difference2set as $row) {
            DB::table('prod_difference_set')->insert([
                'id'     => $row['pds_id'],
                'name'   => $row['pds_name'],
                'sortby' => $row['pds_sortby']
            ]);
        }

    }
}