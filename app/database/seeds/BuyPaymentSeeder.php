<?php

class BuyPaymentSeeder extends Seeder
{
	public function run()
	{
		$i = 1;
		DB::table('buy_payment')->delete();

		DB::table('buy_payment')->insert([
			'id'              => $i++,
			'payment_type_id' => 3,
			'alias'           => 'platebni_karta',
			'name'            => 'Platba kartou předem',
			'price_payment'   => 0
		]);

		DB::table('buy_payment')->insert([
			'id'              => $i++,
			'payment_type_id' => 4,
			'alias'           => 'online_platba',
			'name'            => 'Online platba',
			'price_payment'   => 0
		]);

		DB::table('buy_payment')->insert([
			'id'              => $i++,
			'payment_type_id' => 4,
			'alias'           => 'bankovni_prevod',
			'name'            => 'Bankovní převod',
			'price_payment'   => 0
		]);

		DB::table('buy_payment')->insert([
			'id'              => $i++,
			'payment_type_id' => 1,
			'alias'           => 'platba-dobirkou',
			'name'            => 'Platba dobírkou',
			'price_payment'   => 30
		]);

		DB::table('buy_payment')->insert([
			'id'              => $i++,
			'payment_type_id' => 2,
			'alias'           => 'osobni-prevzeti',
			'name'            => 'Při osobním převzetí (hotově, kartou)',
			'price_payment'   => 0
		]);
	}
}