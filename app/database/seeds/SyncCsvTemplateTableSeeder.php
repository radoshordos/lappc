<?php

class SyncCsvTemplateTableSeeder extends Seeder
{
	public function run()
	{
		DB::table('sync_csv_template')->delete();

		$sync_csv_template = [
			['id' => '5', 'mixture_dev_id' => '1009', 'trigger_column_count' => '4', 'created_at' => '2015-02-09 20:50:51', 'updated_at' => '2015-02-09 20:50:51']
		];

		foreach ($sync_csv_template as $row) {
			DB::table('sync_csv_template')->insert([
				'id'                   => $row['id'],
				'mixture_dev_id'       => $row['mixture_dev_id'],
				'trigger_column_count' => $row['trigger_column_count']
			]);
		}
	}
}