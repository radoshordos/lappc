<?php

class SyncCsvColumnTableSeeder extends Seeder {

	public function run()
	{
        DB::table('sync_csv_template')->delete();

        DB::table('sync_csv_template')->insert(array(
            'mixture_dev_id' => 10,
            'count_column' => 'manual_sync',
        ));
	}

}