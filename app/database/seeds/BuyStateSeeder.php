<?php

class BuyStateSeeder extends Seeder
{

	public function run()
	{
		DB::table('buy_state')->delete();

		DB::table('buy_state')->insert([
			'id'       => 1,
			'forex_id' => 1,
			'visible'  => 1,
			'name'     => 'Česká republika',
			'symbol'   => 'CZ',
		]);

		DB::table('buy_state')->insert([
			'id'       => 2,
			'forex_id' => 2,
			'visible'  => 0,
			'name'     => 'Slovensko',
			'symbol'   => 'SK',
		]);
	}
}