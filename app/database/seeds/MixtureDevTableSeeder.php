<?php

class MixtureDevTableSeeder extends Seeder
{
	public function run()
	{
		DB::table('mixture_dev')->delete();

		$mixture_dev = [
			['id' => '1001', 'purpose' => 'autoall', 'name' => 'MEGAGROUP ALL', 'desc' => 'AutoGenerate ALL dev', 'trigger_column_count' => '139'],
			['id' => '1010', 'purpose' => 'devgroup', 'name' => 'GROUP Makita', 'desc' => NULL, 'trigger_column_count' => '3'],
			['id' => '1012', 'purpose' => 'devgroup', 'name' => 'GROUP Bow', 'desc' => NULL, 'trigger_column_count' => '14'],
			['id' => '1013', 'purpose' => 'devgroup', 'name' => 'GROUP Madalbal', 'desc' => NULL, 'trigger_column_count' => '11'],
			['id' => '1014', 'purpose' => 'devgroup', 'name' => 'GROUP Garland', 'desc' => NULL, 'trigger_column_count' => '21'],
			['id' => '1015', 'purpose' => 'devgroup', 'name' => 'GROUP Proma', 'desc' => NULL, 'trigger_column_count' => '3'],
			['id' => '1016', 'purpose' => 'devgroup', 'name' => 'GROUP V-Garden', 'desc' => NULL, 'trigger_column_count' => '0'],
			['id' => '1017', 'purpose' => 'devgroup', 'name' => 'GROUP Igm', 'desc' => NULL, 'trigger_column_count' => '7'],
            ['id' => '1018', 'purpose' => 'devgroup', 'name' => 'GROUP Papaspol', 'desc' => NULL, 'trigger_column_count' => '8']
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