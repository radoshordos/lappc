<?php

class SyncCsvColumnTableSeeder extends Seeder {

	public function run()
	{
        DB::table('sync_csv_column')->delete();

        DB::table('sync_csv_column')->insert(array(
            'id' => 2,
            'element' => 'name',
        ));

        DB::table('sync_csv_column')->insert(array(
            'id' => 5,
            'element' => 'desc',
        ));

        DB::table('sync_csv_column')->insert(array(
            'id' => 11,
            'element' => 'codeprod',
        ));

        DB::table('sync_csv_column')->insert(array(
            'id' => 12,
            'element' => 'codeean',
        ));

        DB::table('sync_csv_column')->insert(array(
            'id' => 21,
            'element' => 'cena_stnd',
            'desc' => 'Běžná cena produktu'
        ));

        DB::table('sync_csv_column')->insert(array(
            'id' => 22,
            'element' => 'cena_akce',
            'desc' => 'Akční cena, která jde dále ovlivnovat proentuálníma slevama'
        ));

        DB::table('sync_csv_column')->insert(array(
            'id' => 23,
            'element' => 'cena_inet',
            'desc' => 'Pevná akční cena, na kterou se neaplikují další slevy'
        ));

        DB::table('sync_csv_column')->insert(array(
            'id' => 101,
            'element' => 'dev_id',
            'desc' => '#ID výrobce v e-shopu'
        ));

	}

}