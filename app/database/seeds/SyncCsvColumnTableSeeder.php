<?php

class SyncCsvColumnTableSeeder extends Seeder {

	public function run()
	{
        DB::table('sync_csv_column')->delete();

        DB::table('sync_csv_column')->insert(array(
            'id' => 2,
            'element' => 'prod_name',
        ));

        DB::table('sync_csv_column')->insert(array(
            'id' => 5,
            'element' => 'prod_desc',
        ));

        DB::table('sync_csv_column')->insert(array(
            'id' => 11,
            'element' => 'code_product',
        ));

        DB::table('sync_csv_column')->insert(array(
            'id' => 21,
            'element' => 'price_standart',
            'desc' => 'Běžná cena produktu'
        ));

        DB::table('sync_csv_column')->insert(array(
            'id' => 22,
            'element' => 'price_action',
            'desc' => 'Akční cena, která jde dále ovlivnovat proentuálníma slevama'
        ));

        DB::table('sync_csv_column')->insert(array(
            'id' => 23,
            'element' => 'price_internet',
            'desc' => 'Pevná akční cena, na kterou se neaplikují další slevy'
        ));

	}

}