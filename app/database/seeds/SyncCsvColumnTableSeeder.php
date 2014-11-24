<?php

class SyncCsvColumnTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('sync_csv_column')->delete();

        DB::table('sync_csv_column')->insert([
            'id'      => 2,
            'element' => 'name',
            'desc'    => 'Název produktu'
        ]);

        DB::table('sync_csv_column')->insert([
            'id'      => 5,
            'element' => 'desc',
            'desc'    => 'Popis produktu'
        ]);

        DB::table('sync_csv_column')->insert([
            'id'      => 11,
            'element' => 'code_prod',
            'desc'    => 'Kód produktu'
        ]);

        DB::table('sync_csv_column')->insert([
            'id'      => 12,
            'element' => 'code_ean',
            'desc'    => 'EAN produktu'
        ]);

        DB::table('sync_csv_column')->insert([
            'id'      => 21,
            'element' => 'price_standard',
            'desc'    => 'Běžná cena produktu'
        ]);

        DB::table('sync_csv_column')->insert([
            'id'      => 22,
            'element' => 'price_action',
            'desc'    => 'Akční cena, která jde dále ovlivnovat proentuálníma slevama'
        ]);

        DB::table('sync_csv_column')->insert([
            'id'      => 23,
            'element' => 'price_internet',
            'desc'    => 'Pevná akční cena, na kterou se neaplikují další slevy'
        ]);

        DB::table('sync_csv_column')->insert([
            'id'      => 101,
            'element' => 'dev_id',
            'desc'    => '#ID výrobce v e-shopu'
        ]);
    }
}
