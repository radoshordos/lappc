<?php

class SyncDbTableSeeder extends Seeder
{
	public function run()
	{
		DB::table('sync_db')->delete();
	}
}