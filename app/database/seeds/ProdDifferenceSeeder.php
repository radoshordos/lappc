<?php

class ProdDifferenceSeeder extends Seeder
{

	public function run()
	{
		/* IN SHOP (OLD)
		$prod2difference = [
			['pd_id' => '1', 'pd_id_diffmode' => '1', 'pd_visible' => '1', 'pd_lenght' => '0', 'pd_name' => 'Základní'],
			['pd_id' => '10', 'pd_id_diffmode' => '2', 'pd_visible' => '1', 'pd_lenght' => '1', 'pd_name' => 'Velikost'],
			['pd_id' => '20', 'pd_id_diffmode' => '2', 'pd_visible' => '1', 'pd_lenght' => '1', 'pd_name' => 'Délka'],
			['pd_id' => '103', 'pd_id_diffmode' => '2', 'pd_visible' => '1', 'pd_lenght' => '2', 'pd_name' => 'Velikost + Hrubost'],
			['pd_id' => '105', 'pd_id_diffmode' => '2', 'pd_visible' => '1', 'pd_lenght' => '2', 'pd_name' => 'Rozměr + Hrubost'],
			['pd_id' => '160', 'pd_id_diffmode' => '2', 'pd_visible' => '1', 'pd_lenght' => '2', 'pd_name' => 'Toto je test']
		];
		*/

		$prod_difference = [
			['id' => '1', 'visible' => '1', 'count' => '0', 'name' => 'Základní'],
			['id' => '11', 'visible' => '1', 'count' => '1', 'name' => 'Velikost'],
			['id' => '13', 'visible' => '1', 'count' => '1', 'name' => 'Barva'],
			['id' => '143', 'visible' => '1', 'count' => '2', 'name' => 'Velikost + Barva']
		];

		DB::table('prod_difference')->delete();

		foreach ($prod_difference as $row) {
			DB::table('prod_difference')->insert([
				'id'    => $row['id'],
				'count' => $row['count'],
				'name'  => $row['name']
			]);
		}
	}
}