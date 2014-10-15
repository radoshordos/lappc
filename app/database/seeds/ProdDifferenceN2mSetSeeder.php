<?php

class ProdDifferenceN2mSetSeeder extends Seeder
{

    public function run()
    {
        $prod2difference2in2set = [
            ['pdis_id' => '1', 'pdis_id_difference' => '11', 'pdis_id_set' => '11'],
            ['pdis_id' => '2', 'pdis_id_difference' => '13', 'pdis_id_set' => '13'],
            ['pdis_id' => '3', 'pdis_id_difference' => '143', 'pdis_id_set' => '11'],
            ['pdis_id' => '4', 'pdis_id_difference' => '143', 'pdis_id_set' => '13'],
        ];

        DB::table('prod_difference_n2m_set')->delete();

        foreach ($prod2difference2in2set as $row) {

            DB::table('prod_difference_n2m_set')->insert([
                'id'            => $row['pdis_id'],
                'difference_id' => $row['pdis_id_difference'],
                'set_id'        => $row['pdis_id_set']
            ]);
        }
    }
}