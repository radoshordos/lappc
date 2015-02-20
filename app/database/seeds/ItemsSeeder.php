<?php

class ItemsSeeder extends Seeder
{
	public function run()
	{
		$items = [];
		include "migration/items.php";
		DB::table('items')->delete();
		$now = strtotime('now');

		foreach ($items as $row) {

			DB::table('items')->insert([
				'id'              => $row['items_id'],
				'prod_id'         => $row['items_id_prod'],
				'visible'         => $row['items_is_visible'],
				'availability_id' => $row['items_id_availibility'],
				'diff_val1_id'    => $row['items_id_diff1'],
				'diff_val2_id'    => $row['items_id_diff2'],
				'code_prod'       => $row['items_code_product'],
				'created_at'      => date("Y-m-d H:i:s", $row['items_ti_create']),
				'updated_at'      => date("Y-m-d H:i:s", $now),
			]);
		}
	}
}