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
		]);

		DB::table('buy_payment')->insert([
			'id'              => $i++,
			'payment_type_id' => 4,
			'alias'           => 'online_platba',
			'name'            => 'Online platba',
		]);

		DB::table('buy_payment')->insert([
			'id'              => $i++,
			'payment_type_id' => 4,
			'alias'           => 'bankovni_prevod',
			'name'            => 'Bankovní převod',
		]);

	}
}