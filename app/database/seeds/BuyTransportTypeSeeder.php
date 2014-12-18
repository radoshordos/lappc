<?php

class BuyTransportTypeSeeder extends Seeder
{

	public function run()
	{
		$i = 1;
		DB::table('buy_transport_type')->delete();

		DB::table('buy_transport_type')->insert([
			'id'                     => $i++,
			'heureka_transport_type' => 1,
			'name'                   => 'osobní odběr',
		]);

		DB::table('buy_transport_type')->insert([
			'id'                     => $i++,
			'heureka_transport_type' => 2,
			'name'                   => 'Česká pošta',
		]);

		DB::table('buy_transport_type')->insert([
			'id'                     => $i++,
			'heureka_transport_type' => 3,
			'name'                   => 'spediční služba (PPL, DPD, ...)',
		]);

		DB::table('buy_transport_type')->insert([
			'id'                     => $i++,
			'heureka_transport_type' => 4,
			'name'                   => 'expresní dodání',
		]);

		DB::table('buy_transport_type')->insert([
			'id'                     => $i++,
			'heureka_transport_type' => 5,
			'name'                   => 'speciální doprava',
		]);

		DB::table('buy_transport_type')->insert([
			'id'                     => $i++,
			'heureka_transport_type' => 6,
			'name'                   => 'Česká Pošta - Balík Na poštu',
		]);

	}
}