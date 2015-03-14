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
			'alias'           => 'platebni-karta',
			'name'            => 'Platba kartou předem',
            'name_short'      => 'Kartou',
			'price_payment'   => 0
		]);

		DB::table('buy_payment')->insert([
			'id'              => $i++,
			'payment_type_id' => 4,
			'alias'           => 'online-platba',
			'name'            => 'Online platba',
            'name_short'      => 'Online',
			'price_payment'   => 0
		]);

		DB::table('buy_payment')->insert([
			'id'              => $i++,
			'payment_type_id' => 4,
			'alias'           => 'bankovni-prevod',
			'name'            => 'Bankovní převod',
            'name_short'      => 'Převod',
			'price_payment'   => 0
		]);

		DB::table('buy_payment')->insert([
			'id'              => $i++,
			'payment_type_id' => 1,
			'alias'           => 'platba-dobirkou',
			'name'            => 'Platba dobírkou',
            'name_short'      => 'Dobírka',
			'price_payment'   => 30
		]);

		DB::table('buy_payment')->insert([
			'id'              => $i++,
			'payment_type_id' => 2,
			'alias'           => 'osobni-prevzeti',
			'name'            => 'Při osobním převzetí (hotově, kartou)',
            'name_short'      => 'Osobně',
			'price_payment'   => 0
		]);
	}
}