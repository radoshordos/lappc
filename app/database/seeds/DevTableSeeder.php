<?php

class DevTableSeeder extends Seeder {

	public function run() {

		DB::table('dev')->delete();

		DB::table('dev')->insert([
			'id'     => 1,
			'active' => 0,
			'alias'  => 'all',
			'name'   => '[ALL]'
		]);

		DB::table('dev')->insert([
			'id'         => 5,
			'active'     => 1,
			'authorized' => 1,
			'alias'      => 'makita',
			'name'       => 'Makita'
		]);

		DB::table('dev')->insert([
			'id'         => 6,
			'active'     => 1,
			'authorized' => 1,
			'alias'      => 'maktec',
			'name'       => 'Maktec'
		]);

		DB::table('dev')->insert([
			'id'     => 10,
			'active' => 1,
			'alias'  => 'narex',
			'name'   => 'Narex'
		]);

		DB::table('dev')->insert([
			'id'     => 20,
			'active' => 1,
			'alias'  => 'metabo',
			'name'   => 'Metabo'
		]);

		DB::table('dev')->insert([
			'id'         => 30,
			'active'     => 1,
			'authorized' => 1,
			'alias'      => 'dolmar',
			'name'       => 'Dolmar'
		]);

		DB::table('dev')->insert([
			'id'     => 35,
			'alias'  => 'proma',
			'name'   => 'Proma'
		]);

		DB::table('dev')->insert([
			'id'     => 40,
			'alias'  => 'dewalt',
			'name'   => 'Dewalt'
		]);

		DB::table('dev')->insert([
			'id'     => 45,
			'alias'  => 'narex_bystrice',
			'name'   => 'Narex Bystřice'
		]);

		DB::table('dev')->insert([
			'id'     => 160,
			'alias'  => 'fiskars',
			'name'   => 'Fiskars'
		]);

		DB::table('dev')->insert([
			'id'     => 620,
			'alias'  => 'kinex',
			'name'   => 'Kinex'
		]);
	}
}