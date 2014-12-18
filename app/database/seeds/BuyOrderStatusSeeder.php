<?php

class BuyOrderStatusSeeder extends Seeder
{

	public function run()
	{
		$i = 1;
		DB::table('buy_order_status')->delete();

		DB::table('buy_order_status')->insert([
			'id'                  => $i++,
			'heureka_order_status' => 0,
			'desc'                => 'objednávka vyexpedována (obchod odeslal objednávku zákazníkovi)',
		]);

		DB::table('buy_order_status')->insert([
			'id'                  => $i++,
			'heureka_order_status' => 1,
			'desc'                => 'objednávka odeslána do obchodu',
		]);

		DB::table('buy_order_status')->insert([
			'id'                  => $i++,
			'heureka_order_status' => 2,
			'desc'                => 'objednávka byla vyřízena jen částečně (počítá se s tím, že bude v budoucnu doručena kompletní)',
		]);

		DB::table('buy_order_status')->insert([
			'id'                  => $i++,
			'heureka_order_status' => 3,
			'desc'                => 'objednávka potvrzena (obchod objednávku přijal a potvrzuje, že ji začíná zpracovávat)',
		]);

		DB::table('buy_order_status')->insert([
			'id'                  => $i++,
			'heureka_order_status' => 4,
			'desc'                => 'storno z pohledu obchodu (obchod stornoval objednávku)',
		]);

		DB::table('buy_order_status')->insert([
			'id'                  => $i++,
			'heureka_order_status' => 5,
			'desc'                => 'storno z pohledu zákazníka (zákazník se rozhodl stornovat objednávku)',
		]);

		DB::table('buy_order_status')->insert([
			'id'                  => $i++,
			'heureka_order_status' => 6,
			'desc'                => 'storno - objednávka nebyla zaplacena (zákazník nezaplatil za objednávku)',
		]);

		DB::table('buy_order_status')->insert([
			'id'                  => $i++,
			'heureka_order_status' => 7,
			'desc'                => 'vráceno ve 14 denní lhůtě (zákazník vrátil zboží v zákonné 14 denní lhůtě)',
		]);

		DB::table('buy_order_status')->insert([
			'id'                  => $i++,
			'heureka_order_status' => 8,
			'desc'                => 'objednávka byla dokončena na Heurece (objednávka byla správně dokončena na Heurece)',
		]);

		DB::table('buy_order_status')->insert([
			'id'                  => $i++,
			'heureka_order_status' => 9,
			'desc'                => 'objednávka dokončena (zákazník zaplatil a převzal objednávku)',
		]);

		DB::table('buy_order_status')->insert([
			'id'                  => $i++,
			'heureka_order_status' => 10,
			'desc'                => 'objednávka připravena k vyzvednutí (objednávka je připravena pro osobní odběr na pobočce)',
		]);

		DB::table('buy_order_status')->insert([
			'id'                  => $i++,
			'heureka_order_status' => 11,
			'desc'                => 'vyexpedováno na externí výdejní místo (např. Heureka point)',
		]);
	}
}