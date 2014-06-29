<?php


class PpcAdQualitySeeder extends Seeder
{
    public function run()
    {
        DB::table('ppc_ad_quality')->delete();

        DB::table('ppc_ad_quality')->insert(array(
            'id' => 1,
            'visible' => 1,
            'name' => 'Univerzální',
            'index' => 0
        ));

        DB::table('ppc_ad_quality')->insert(array(
            'id' => 2,
            'visible' => 0,
            'name' => 'Skladem',
            'index' => 1
        ));

        DB::table('ppc_ad_quality')->insert(array(
            'id' => 4,
            'visible' => 0,
            'name' => 'Akce',
            'index' => 2
        ));

        DB::table('ppc_ad_quality')->insert(array(
            'id' => 6,
            'visible' => 1,
            'name' => 'Akce + Skladem',
            'index' => 3
        ));

        DB::table('ppc_ad_quality')->insert(array(
            'id' => 8,
            'visible' => 1,
            'name' => 'Cena',
            'index' => 4
        ));

        DB::table('ppc_ad_quality')->insert(array(
            'id' => 10,
            'visible' => 1,
            'name' => 'Cena + Skladem',
            'index' => 5
        ));

        DB::table('ppc_ad_quality')->insert(array(
            'id' => 12,
            'visible' => 1,
            'name' => 'Cena + Akce',
            'index' => 6
        ));

        DB::table('ppc_ad_quality')->insert(array(
            'id' => 14,
            'visible' => 1,
            'name' => 'Cena + Akce + Skladem',
            'index' => 7
        ));
    }
}