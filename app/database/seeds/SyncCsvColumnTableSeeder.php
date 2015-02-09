<?php

class SyncCsvColumnTableSeeder extends Seeder
{
	public function run()
	{
		DB::table('sync_csv_column')->delete();

		$sync_csv_column = [
			['id' => '2', 'element' => 'name', 'desc' => 'Název produktu'],
			['id' => '5', 'element' => 'desc', 'desc' => 'Popis produktu'],
			['id' => '11', 'element' => 'code_prod', 'desc' => 'Kód produktu'],
			['id' => '12', 'element' => 'code_ean', 'desc' => 'EAN produktu'],
			['id' => '21', 'element' => 'price_standard', 'desc' => 'Běžná cena produktu'],
			['id' => '22', 'element' => 'price_action', 'desc' => 'Akční cena, která jde dále ovlivnovat proentuálníma slevama'],
			['id' => '23', 'element' => 'price_internet', 'desc' => 'Pevná akční cena, na kterou se neaplikují další slevy'],
			['id' => '101', 'element' => 'dev_id', 'desc' => '#ID výrobce v e-shopu']
		];

		foreach ($sync_csv_column as $row) {
			DB::table('sync_csv_column')->insert([
				'id'      => $row['id'],
				'element' => $row['element'],
				'desc'    => $row['desc']
			]);
		}
	}
}