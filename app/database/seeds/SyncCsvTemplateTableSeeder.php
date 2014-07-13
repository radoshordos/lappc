<?php

class SyncCsvTemplateTableSeeder extends Seeder {

	public function run()
	{
        DB::table('sync_csv_template')->delete();

        DB::table('sync_csv_template')->insert(array(
            'id' => 1,
            'mixture_dev_id' => 10,
            'purpose' => 'sync',
        ));

        DB::table('sync_csv_template')->insert(array(
            'id' => 2,
            'mixture_dev_id' => 11,
            'purpose' => 'sync',
        ));
	}

}