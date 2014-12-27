<?php

class BuyDeliverySeeder extends Seeder
{

	public function run()
	{
		DB::table('buy_delivery')->delete();

		DB::table('buy_delivery')->insert([
			'id'        => 1,
			'active'    => 1,
			'name'      => 'Česká pošta',
			'alias'     => 'CESKA_POSTA',
			'price'     => 0,
			'price_doc' => 0
		]);

		DB::table('buy_delivery')->insert([
			'id'        => 2,
			'active'    => 1,
			'name'      => 'Česká pošta - Balík Na poštu',
			'alias'     => 'CESKA_POSTA_NA_POSTU',
			'price'     => 0,
			'price_doc' => 0
		]);

		DB::table('buy_delivery')->insert([
			'id'        => 3,
			'active'    => 1,
			'name'      => 'ČSAD Logistik Ostrava',
			'alias'     => 'CSAD_LOGISTIK_OSTRAVA',
			'price'     => 0,
			'price_doc' => 0
		]);

		DB::table('buy_delivery')->insert([
			'id'        => 4,
			'active'    => 1,
			'name'      => 'DPD',
			'alias'     => 'DPD',
			'price'     => 0,
			'price_doc' => 0
		]);

		DB::table('buy_delivery')->insert([
			'id'        => 5,
			'active'    => 1,
			'name'      => 'DHL',
			'alias'     => 'DHL',
			'price'     => 0,
			'price_doc' => 0
		]);

		DB::table('buy_delivery')->insert([
			'id'        => 6,
			'active'    => 1,
			'name'      => 'DSV',
			'alias'     => 'DSV',
			'price'     => 0,
			'price_doc' => 0
		]);

		DB::table('buy_delivery')->insert([
			'id'        => 7,
			'active'    => 1,
			'name'      => 'EMS',
			'alias'     => 'EMS',
			'price'     => 0,
			'price_doc' => 0
		]);

		DB::table('buy_delivery')->insert([
			'id'        => 8,
			'active'    => 1,
			'name'      => 'FOFR',
			'alias'     => 'FOFR',
			'price'     => 0,
			'price_doc' => 0
		]);

		DB::table('buy_delivery')->insert([
			'id'        => 9,
			'active'    => 1,
			'name'      => 'Gebrüder Weiss',
			'alias'     => 'GEBRUDER_WEISS',
			'price'     => 0,
			'price_doc' => 0
		]);

		DB::table('buy_delivery')->insert([
			'id'        => 10,
			'active'    => 1,
			'name'      => 'Geis',
			'alias'     => 'GEIS',
			'price'     => 0,
			'price_doc' => 0
		]);

		DB::table('buy_delivery')->insert([
			'id'        => 11,
			'active'    => 1,
			'name'      => 'General Parcel',
			'alias'     => 'GENERAL_PARCEL',
			'price'     => 0,
			'price_doc' => 0
		]);

		DB::table('buy_delivery')->insert([
			'id'        => 12,
			'active'    => 1,
			'name'      => 'GLS',
			'alias'     => 'GLS',
			'price'     => 0,
			'price_doc' => 0
		]);

		DB::table('buy_delivery')->insert([
			'id'        => 13,
			'active'    => 1,
			'name'      => 'HDS',
			'alias'     => 'HDS',
			'price'     => 0,
			'price_doc' => 0
		]);

		DB::table('buy_delivery')->insert([
			'id'        => 14,
			'active'    => 1,
			'name'      => 'HeurekaPoint',
			'alias'     => 'HEUREKAPOINT',
			'price'     => 0,
			'price_doc' => 0
		]);

		DB::table('buy_delivery')->insert([
			'id'        => 15,
			'active'    => 1,
			'name'      => 'InTime',
			'alias'     => 'INTIME',
			'price'     => 0,
			'price_doc' => 0
		]);

		DB::table('buy_delivery')->insert([
			'id'        => 16,
			'active'    => 1,
			'name'      => 'PPL',
			'alias'     => 'PPL',
			'price'     => 0,
			'price_doc' => 0
		]);


		DB::table('buy_delivery')->insert([
			'id'        => 17,
			'active'    => 1,
			'name'      => 'Radiálka',
			'alias'     => 'RADIALKA',
			'price'     => 0,
			'price_doc' => 0
		]);

		DB::table('buy_delivery')->insert([
			'id'        => 18,
			'active'    => 1,
			'name'      => 'Seegmuller',
			'alias'     => 'SEEGMULLER',
			'price'     => 0,
			'price_doc' => 0
		]);

		DB::table('buy_delivery')->insert([
			'id'        => 19,
			'active'    => 1,
			'name'      => 'TNT',
			'alias'     => 'TNT',
			'price'     => 0,
			'price_doc' => 0
		]);

		DB::table('buy_delivery')->insert([
			'id'        => 20,
			'active'    => 1,
			'name'      => 'TOPTRANS',
			'alias'     => 'TOPTRANS',
			'price'     => 0,
			'price_doc' => 0
		]);

		DB::table('buy_delivery')->insert([
			'id'        => 21,
			'active'    => 1,
			'name'      => 'UPS',
			'alias'     => 'UPS',
			'price'     => 0,
			'price_doc' => 0
		]);

		DB::table('buy_delivery')->insert([
			'id'        => 22,
			'active'    => 1,
			'name'      => 'Vlastní přeprava',
			'alias'     => 'VLASTNI_PREPRAVA',
			'price'     => 0,
			'price_doc' => 0
		]);

	}
}


