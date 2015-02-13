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
			'desc'              => 'Osobní odběr - Zásilkovna | 0-10000 | 0-10',
			'price_start'       => 0,
			'price_end'         => 10000,
			'weight_start'      => 0,
			'weight_end'        => 10,
			'price_transport'   => 30
		]);

		DB::table('buy_transport')->insert([
			'id'                => $i++,
			'alias'             => 'osobni_odber',
			'transport_type_id' => 1,
			'name'              => 'Osobní odběr - V obchodě (Benešov)',
			'desc'              => 'Osobní odběr - V obchodě (Benešov) | 0-999999999 | 0-999999999',
			'price_start'       => 0,
			'price_end'         => 999999999,
			'weight_start'      => 0,
			'weight_end'        => 999999999,
			'price_transport'   => 0
		]);

		DB::table('buy_transport')->insert([
			'id'                => $i++,
			'alias'             => 'balik-do-30',
			'transport_type_id' => 3,
			'name'              => 'Balík do 30kg',
			'desc'              => 'Balík | 0-10000 | 0-30',
			'price_start'       => 0,
			'price_end'         => 10000,
			'weight_start'      => 0,
			'weight_end'        => 30,
			'price_transport'   => 100
		]);

		DB::table('buy_transport')->insert([
			'id'                => $i++,
			'alias'             => 'balik-30-plus',
			'transport_type_id' => 3,
			'name'              => 'Balík 30kg+',
			'desc'              => 'Balík | 0-10000 | 30-100',
			'price_start'       => 0,
			'price_end'         => 10000,
			'weight_start'      => 30,
			'weight_end'        => 100,
			'price_transport'   => 200
		]);

		DB::table('buy_transport')->insert([
			'id'                => $i++,
			'alias'             => 'dobirka',
			'transport_type_id' => 3,
			'name'              => 'Dobírka',
			'desc'              => 'Dobírka | 0-50000 | 0-30',
			'price_start'       => 0,
			'price_end'         => 50000,
			'weight_start'      => 0,
			'weight_end'        => 30,
			'price_transport'   => 130
		]);
	}
}