<?php

class RecordSyncImportSeeder extends Seeder
{

	public function run()
	{
		$record_sync_import = [
			['id' => '1423516450', 'template_id' => '5', 'purpose' => 'action', 'name' => 'Authority\\Tools\\Import\\ManualSyncImport', 'item_counter_all' => '97', 'item_counter_insert' => '97', 'created_at' => '2015-02-09 21:14:10']
		];

		DB::table('record_sync_import')->delete();
		foreach ($record_sync_import as $row) {
			DB::table('record_sync_import')->insert([
				'id'                  => $row['id'],
				'template_id'         => $row['template_id'],
				'purpose'             => $row['purpose'],
				'name'                => $row['name'],
				'item_counter_all'    => $row['item_counter_all'],
				'item_counter_insert' => $row['item_counter_insert'],
				'created_at'          => $row['created_at']
			]);
		}
	}
}