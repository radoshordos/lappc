<?php

class ProdDifferenceSetSeeder extends Seeder
{

	public function run()
	{
		// IN SHOP OLD
		/*
		$prod2difference2set = [
			['pds_id' => '1', 'pds_visible' => '0', 'pds_name' => '[A/N]', 'pds_sortby' => 'pdv_id'],
			['pds_id' => '10', 'pds_visible' => '1', 'pds_name' => 'Velikost', 'pds_sortby' => 'pdv_id'],
			['pds_id' => '40', 'pds_visible' => '1', 'pds_name' => 'Rozměr', 'pds_sortby' => 'pdv_id'],
			['pds_id' => '50', 'pds_visible' => '1', 'pds_name' => 'Hrubost', 'pds_sortby' => 'pdv_id'],
		];
		*/

		$prod2difference2set = [
			['pds_id' => '1', 'pds_visible' => '1', 'pds_name' => '[A/N]', 'pds_sortby' => 'id'],
			['pds_id' => '11', 'pds_visible' => '1', 'pds_name' => 'Velikost', 'pds_sortby' => 'id']
		];

		DB::table('prod_difference_set')->delete();

		foreach ($prod2difference2set as $row) {
			DB::table('prod_difference_set')->insert([
				'id'     => $row['pds_id'],
				'name'   => $row['pds_name'],
				'sortby' => $row['pds_sortby']
			]);
		}
	}
}