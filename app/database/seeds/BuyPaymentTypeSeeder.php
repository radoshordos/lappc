<?php

class BuyPaymentTypeSeeder extends Seeder
{
	public function run()
	{
		$i = 1;
		DB::table('buy_payment_type')->delete();

		DB::table('buy_payment_type')->insert([
			'id'                   => $i++,
			'heureka_payment_type' => 1,
			'name'                 => 'dobírka',
		]);

		DB::table('buy_payment_type')->insert([
			'id'                   => $i++,
			'heureka_payment_type' => 2,
			'name'                 => 'hotově při osobním převzetí',
		]);

		DB::table('buy_payment_type')->insert([
			'id'                   => $i++,
			'heureka_payment_type' => 3,
			'name'                 => 'platební karta',
		]);

		DB::table('buy_payment_type')->insert([
			'id'                   => $i++,
			'heureka_payment_type' => 4,
			'name'                 => 'převod na účet',
		]);
	}
}