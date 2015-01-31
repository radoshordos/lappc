<?php

class MixtureDevTableSeeder extends Seeder
{
	public function run()
	{
		DB::table('mixture_dev')->delete();
		$mixture_dev = [
			['id' => '1', 'purpose' => 'autoall', 'name' => 'VĹĄichni vĂ˝robci', 'desc' => 'AutoGenerate ALL dev', 'trigger_column_count' => '0'],
			['id' => '10', 'purpose' => 'devgroup', 'name' => 'Makita GROUP', 'desc' => NULL, 'trigger_column_count' => '3'],
			['id' => '12', 'purpose' => 'devgroup', 'name' => 'GROUP Bow', 'desc' => NULL, 'trigger_column_count' => '14'],
			['id' => '13', 'purpose' => 'devgroup', 'name' => 'GROUP Madalbal', 'desc' => NULL, 'trigger_column_count' => '11'],
			['id' => '14', 'purpose' => 'devgroup', 'name' => 'GROUP Garland', 'desc' => NULL, 'trigger_column_count' => '21']
		];

		foreach ($mixture_dev as $row) {
			DB::table('mixture_dev')->insert([
				'id'      => $row['id'],
				'purpose' => $row['purpose'],
				'name'    => $row['name'],
				'desc'    => $row['desc']
			]);
		}
	}
}