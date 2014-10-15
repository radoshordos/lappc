<?php

class ProdDifferenceValuesSeeder extends Seeder
{

    public function run()
    {
        $prod2difference2values = [
            ['pdv_id' => '1', 'pdv_id_set' => '1', 'pdv_id_extra' => '0', 'pdv_name' => '[A/N]'],
            ['pdv_id' => '1007', 'pdv_id_set' => '11', 'pdv_id_extra' => '1', 'pdv_name' => 'M'],
            ['pdv_id' => '1008', 'pdv_id_set' => '11', 'pdv_id_extra' => '1', 'pdv_name' => 'L'],
            ['pdv_id' => '1009', 'pdv_id_set' => '11', 'pdv_id_extra' => '1', 'pdv_name' => 'XL'],
            ['pdv_id' => '1010', 'pdv_id_set' => '11', 'pdv_id_extra' => '1', 'pdv_name' => 'XXL'],
            ['pdv_id' => '1101', 'pdv_id_set' => '11', 'pdv_id_extra' => '1', 'pdv_name' => 'velikost 36'],
            ['pdv_id' => '1104', 'pdv_id_set' => '11', 'pdv_id_extra' => '1', 'pdv_name' => 'velikost 37'],
            ['pdv_id' => '1107', 'pdv_id_set' => '11', 'pdv_id_extra' => '1', 'pdv_name' => 'velikost 38'],
            ['pdv_id' => '1110', 'pdv_id_set' => '11', 'pdv_id_extra' => '1', 'pdv_name' => 'velikost 39'],
            ['pdv_id' => '1113', 'pdv_id_set' => '11', 'pdv_id_extra' => '1', 'pdv_name' => 'velikost 40'],
            ['pdv_id' => '1116', 'pdv_id_set' => '11', 'pdv_id_extra' => '1', 'pdv_name' => 'velikost 41'],
            ['pdv_id' => '1119', 'pdv_id_set' => '11', 'pdv_id_extra' => '1', 'pdv_name' => 'velikost 42'],
            ['pdv_id' => '1122', 'pdv_id_set' => '11', 'pdv_id_extra' => '1', 'pdv_name' => 'velikost 43'],
            ['pdv_id' => '1125', 'pdv_id_set' => '11', 'pdv_id_extra' => '1', 'pdv_name' => 'velikost 44'],
            ['pdv_id' => '1128', 'pdv_id_set' => '11', 'pdv_id_extra' => '1', 'pdv_name' => 'velikost 45'],
            ['pdv_id' => '1131', 'pdv_id_set' => '11', 'pdv_id_extra' => '1', 'pdv_name' => 'velikost 46'],
            ['pdv_id' => '1134', 'pdv_id_set' => '11', 'pdv_id_extra' => '1', 'pdv_name' => 'velikost 47'],
            ['pdv_id' => '1137', 'pdv_id_set' => '11', 'pdv_id_extra' => '1', 'pdv_name' => 'velikost 48'],
            ['pdv_id' => '1140', 'pdv_id_set' => '11', 'pdv_id_extra' => '1', 'pdv_name' => 'velikost 49'],
            ['pdv_id' => '1143', 'pdv_id_set' => '11', 'pdv_id_extra' => '1', 'pdv_name' => 'velikost 50'],
            ['pdv_id' => '1300', 'pdv_id_set' => '13', 'pdv_id_extra' => '1', 'pdv_name' => 'Modrá'],
            ['pdv_id' => '1301', 'pdv_id_set' => '13', 'pdv_id_extra' => '1', 'pdv_name' => 'Zelená'],
            ['pdv_id' => '1302', 'pdv_id_set' => '13', 'pdv_id_extra' => '1', 'pdv_name' => 'Žlutá']
        ];

        DB::table('prod_difference_values')->delete();

        foreach ($prod2difference2values as $row) {

            DB::table('prod_difference_values')->insert([
                'id'     => $row['pdv_id'],
                'set_id' => $row['pdv_id_set'],
                'name'   => $row['pdv_name']
            ]);
        }
    }
}