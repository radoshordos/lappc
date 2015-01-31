<?php

class GrabProfileSeeder extends Seeder
{
	public function run()
	{
		$grab_profile = [
			['id' => '62', 'active' => '1', 'charset' => 'UTF-8', 'name' => 'bow.cz']
		];

		DB::table('grab_profile')->delete();
		foreach ($grab_profile as $row) {

			DB::table('grab_profile')->insert([
				'id'      => $row['id'],
				'active'  => $row['active'],
				'charset' => $row['charset'],
				'name'    => $row['name'],
			]);
		}
	}
}