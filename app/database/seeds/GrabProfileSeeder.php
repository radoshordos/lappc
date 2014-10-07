<?php

class GrabProfileSeeder extends Seeder
{

    public function run()
    {

        $filter2profile = [
            ['fp_id' => '50', 'fp_id_category' => '3', 'fp_visible' => '0', 'fp_charset' => 'UTF-8', 'fp_name' => 'www.festool.cz NORAL'],
            ['fp_id' => '51', 'fp_id_category' => '3', 'fp_visible' => '0', 'fp_charset' => 'UTF-8', 'fp_name' => 'www.protool.cz'],
            ['fp_id' => '52', 'fp_id_category' => '3', 'fp_visible' => '0', 'fp_charset' => 'UTF-8', 'fp_name' => 'www.festool.cz PRISLUSENSTVI'],
            ['fp_id' => '53', 'fp_id_category' => '3', 'fp_visible' => '1', 'fp_charset' => 'UTF-8', 'fp_name' => 'www.BOW.cz'],
            ['fp_id' => '54', 'fp_id_category' => '3', 'fp_visible' => '0', 'fp_charset' => 'UTF-8', 'fp_name' => 'www.zahradahrou.cz'],
            ['fp_id' => '55', 'fp_id_category' => '3', 'fp_visible' => '0', 'fp_charset' => 'Windows-1250', 'fp_name' => 'www.metabo.cz'],
            ['fp_id' => '56', 'fp_id_category' => '3', 'fp_visible' => '0', 'fp_charset' => 'UTF-8', 'fp_name' => 'http://www.promacz.cz'],
            ['fp_id' => '57', 'fp_id_category' => '3', 'fp_visible' => '0', 'fp_charset' => 'UTF-8', 'fp_name' => 'http://www.werco.cz/'],
            ['fp_id' => '58', 'fp_id_category' => '3', 'fp_visible' => '1', 'fp_charset' => 'UTF-8', 'fp_name' => 'http://www.dewalt.cz/'],
            ['fp_id' => '59', 'fp_id_category' => '3', 'fp_visible' => '1', 'fp_charset' => 'UTF-8', 'fp_name' => 'http://www.stanleyworks.cz/'],
            ['fp_id' => '60', 'fp_id_category' => '3', 'fp_visible' => '0', 'fp_charset' => 'UTF-8', 'fp_name' => 'GARL => Scheppach'],
            ['fp_id' => '61', 'fp_id_category' => '3', 'fp_visible' => '1', 'fp_charset' => 'UTF-8', 'fp_name' => 'GARL => DWT']
        ];

        DB::table('grab_profile')->delete();

        foreach ($filter2profile as $row) {

            DB::table('dev')->insert([
                'id'      => $row['fp_id'],
                'active'  => $row['fp_visible'],
                'charset' => $row['fp_charset'],
                'name'    => $row['fp_name'],
            ]);
        }
    }

}