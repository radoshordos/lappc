<?php

class ColumnDbSeeder extends Seeder
{
	public function run()
	{
		$column_db = [
			['columna_id' => '1', 'columna_id_tables' => '1', 'columna_visible_filter' => '1', 'columna_name' => '---'],
			['columna_id' => '2', 'columna_id_tables' => '1', 'columna_visible_filter' => '1', 'columna_name' => 'db'],
			['columna_id' => '4', 'columna_id_tables' => '3', 'columna_visible_filter' => '1', 'columna_name' => 'prod_id_tree'],
			['columna_id' => '5', 'columna_id_tables' => '3', 'columna_visible_filter' => '1', 'columna_name' => 'prod_id_dev'],
			['columna_id' => '7', 'columna_id_tables' => '3', 'columna_visible_filter' => '0', 'columna_name' => 'prod_id_mode'],
			['columna_id' => '8', 'columna_id_tables' => '3', 'columna_visible_filter' => '1', 'columna_name' => 'prod_id_warranty'],
			['columna_id' => '9', 'columna_id_tables' => '3', 'columna_visible_filter' => '1', 'columna_name' => 'prod_id_difference'],
			['columna_id' => '10', 'columna_id_tables' => '3', 'columna_visible_filter' => '1', 'columna_name' => 'prod_name'],
			['columna_id' => '11', 'columna_id_tables' => '1', 'columna_visible_filter' => '1', 'columna_name' => 'prod_nad1'],
			['columna_id' => '12', 'columna_id_tables' => '1', 'columna_visible_filter' => '1', 'columna_name' => 'prod_txt1'],
			['columna_id' => '13', 'columna_id_tables' => '1', 'columna_visible_filter' => '1', 'columna_name' => 'prod_nad2'],
			['columna_id' => '14', 'columna_id_tables' => '1', 'columna_visible_filter' => '1', 'columna_name' => 'prod_txt2'],
			['columna_id' => '15', 'columna_id_tables' => '1', 'columna_visible_filter' => '1', 'columna_name' => 'prod_nad3'],
			['columna_id' => '16', 'columna_id_tables' => '1', 'columna_visible_filter' => '1', 'columna_name' => 'prod_txt3'],
			['columna_id' => '20', 'columna_id_tables' => '3', 'columna_visible_filter' => '1', 'columna_name' => 'prod_img_big'],
			['columna_id' => '21', 'columna_id_tables' => '3', 'columna_visible_filter' => '1', 'columna_name' => 'prod_price'],
			['columna_id' => '23', 'columna_id_tables' => '3', 'columna_visible_filter' => '1', 'columna_name' => 'prod_desc'],
			['columna_id' => '31', 'columna_id_tables' => '1', 'columna_visible_filter' => '1', 'columna_name' => 'prod_picture01'],
			['columna_id' => '32', 'columna_id_tables' => '1', 'columna_visible_filter' => '1', 'columna_name' => 'prod_picture02'],
			['columna_id' => '33', 'columna_id_tables' => '1', 'columna_visible_filter' => '1', 'columna_name' => 'prod_picture03'],
			['columna_id' => '34', 'columna_id_tables' => '1', 'columna_visible_filter' => '1', 'columna_name' => 'prod_picture04'],
			['columna_id' => '35', 'columna_id_tables' => '1', 'columna_visible_filter' => '1', 'columna_name' => 'prod_picture05'],
			['columna_id' => '36', 'columna_id_tables' => '1', 'columna_visible_filter' => '1', 'columna_name' => 'prod_picture06'],
			['columna_id' => '37', 'columna_id_tables' => '1', 'columna_visible_filter' => '1', 'columna_name' => 'prod_picture07'],
			['columna_id' => '38', 'columna_id_tables' => '1', 'columna_visible_filter' => '1', 'columna_name' => 'prod_picture08'],
			['columna_id' => '39', 'columna_id_tables' => '1', 'columna_visible_filter' => '1', 'columna_name' => 'prod_picture09'],
			['columna_id' => '40', 'columna_id_tables' => '1', 'columna_visible_filter' => '1', 'columna_name' => 'prod_picture10'],
			['columna_id' => '41', 'columna_id_tables' => '1', 'columna_visible_filter' => '1', 'columna_name' => 'prod_picture11'],
			['columna_id' => '42', 'columna_id_tables' => '1', 'columna_visible_filter' => '1', 'columna_name' => 'prod_picture12'],
			['columna_id' => '43', 'columna_id_tables' => '1', 'columna_visible_filter' => '1', 'columna_name' => 'prod_picture13'],
			['columna_id' => '44', 'columna_id_tables' => '1', 'columna_visible_filter' => '1', 'columna_name' => 'prod_picture14'],
			['columna_id' => '45', 'columna_id_tables' => '1', 'columna_visible_filter' => '1', 'columna_name' => 'prod_picture15'],
			['columna_id' => '51', 'columna_id_tables' => '2', 'columna_visible_filter' => '1', 'columna_name' => 'items_id_sale'],
			['columna_id' => '52', 'columna_id_tables' => '2', 'columna_visible_filter' => '1', 'columna_name' => 'items_code_prod'],
			['columna_id' => '53', 'columna_id_tables' => '2', 'columna_visible_filter' => '1', 'columna_name' => 'items_code_ean'],
			['columna_id' => '54', 'columna_id_tables' => '2', 'columna_visible_filter' => '1', 'columna_name' => 'items_id_availability'],
			['columna_id' => '101', 'columna_id_tables' => '10', 'columna_visible_filter' => '0', 'columna_name' => 'si_prod_id_dev'],
			['columna_id' => '102', 'columna_id_tables' => '10', 'columna_visible_filter' => '0', 'columna_name' => 'si_prod_name'],
			['columna_id' => '103', 'columna_id_tables' => '10', 'columna_visible_filter' => '0', 'columna_name' => 'si_prod_desc'],
			['columna_id' => '104', 'columna_id_tables' => '10', 'columna_visible_filter' => '0', 'columna_name' => 'si_prod_img_source'],
			['columna_id' => '105', 'columna_id_tables' => '10', 'columna_visible_filter' => '0', 'columna_name' => 'si_prod_availability_count'],
			['columna_id' => '106', 'columna_id_tables' => '10', 'columna_visible_filter' => '0', 'columna_name' => 'si_items_code_ean'],
			['columna_id' => '107', 'columna_id_tables' => '10', 'columna_visible_filter' => '0', 'columna_name' => 'si_items_code_product'],
			['columna_id' => '108', 'columna_id_tables' => '10', 'columna_visible_filter' => '0', 'columna_name' => 'si_items_price_end'],
			['columna_id' => '109', 'columna_id_tables' => '10', 'columna_visible_filter' => '0', 'columna_name' => 'si_common_group'],
			['columna_id' => '110', 'columna_id_tables' => '11', 'columna_visible_filter' => '0', 'columna_name' => 'tree_name'],
			['columna_id' => '120', 'columna_id_tables' => '12', 'columna_visible_filter' => '0', 'columna_name' => 'dev_name']
		];

		DB::table('column_db')->delete();
		foreach ($column_db as $row) {

			DB::table('column_db')->insert([
				'id'           => $row['columna_id'],
				'table_id'     => $row['columna_id_tables'],
				'visible_grab' => $row['columna_visible_filter'],
				'name'         => $row['columna_name'],
			]);
		}
	}
}