<?php

class AkceAvailabilitySeeder extends Seeder
{
	public function run()
	{
		DB::table('akce_availability')->delete();

		$akce_availability = [
			['id' => '1', 'origin' => '1', 'name' => 'Akce platí do vyprodání zásob'],
			['id' => '2', 'origin' => '1', 'name' => 'Akce platí do vyprodání skladových zásob'],
			['id' => '3', 'origin' => '0', 'name' => 'Akce platná do 28.2.2015 nebo do vyprodání zásob']
		];

		foreach ($akce_availability as $row) {
			DB::table('akce_availability')->insert([
				'id'     => $row['id'],
				'origin' => $row['origin'],
				'name'   => $row['name']
			]);
		}
	}
}
