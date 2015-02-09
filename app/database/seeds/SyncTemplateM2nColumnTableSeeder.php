<?php

class SyncTemplateM2nColumnTableSeeder extends Seeder
{
	public function run()
	{
		DB::table('sync_template_m2n_column')->delete();

		$sync_template_m2n_column = [
			['id' => '5', 'template_id' => '5', 'column_id' => '2'],
			['id' => '6', 'template_id' => '5', 'column_id' => '11'],
			['id' => '7', 'template_id' => '5', 'column_id' => '5'],
			['id' => '8', 'template_id' => '5', 'column_id' => '22']
		];

		foreach ($sync_template_m2n_column as $row) {
			DB::table('sync_template_m2n_column')->insert([
				'id'          => $row['id'],
				'template_id' => $row['template_id'],
				'column_id'   => $row['column_id']
			]);
		}
	}
}