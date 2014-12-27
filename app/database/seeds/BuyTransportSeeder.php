<?php

class BuyTransportSeeder extends Seeder
{

	public function run()
	{
		$i = 1;
		DB::table('buy_transport')->delete();

		DB::table('buy_transport')->insert([
			'id'                => $i++,
			'alias'             => 'zasilkovna',
			'transport_type_id' => 5,
			'name'              => 'Osobní odběr - Zásilkovna',
		]);

		DB::table('buy_transport')->insert([
			'id'                => $i++,
			'alias'             => 'osobni_odber',
			'transport_type_id' => 1,
			'name'              => 'Osobní odběr - V obchodě (Benešov)',
		]);

		DB::table('buy_transport')->insert([
			'id'                => $i++,
			'alias'             => 'balik',
			'transport_type_id' => 3,
			'name'              => 'Balík',
		]);

		DB::table('buy_transport')->insert([
			'id'                => $i++,
			'alias'             => 'dobirka',
			'transport_type_id' => 3,
			'name'              => 'Dobírka',
		]);

	}
}