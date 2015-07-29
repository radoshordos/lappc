<?php

class AkceTemplateSeeder extends Seeder
{
	public function run()
	{
		DB::table('akce_template')->delete();

		$akce_template = [
			['id' => '1', 'mixture_dev_id' => '10', 'availability_id' => '1', 'minitext_id' => '1', 'mixture_item_id' => NULL, 'endtime' => '2028-01-01', 'bonus_title' => '[NULL]', 'bonus_text' => NULL, 'created_at' => '0000-00-00 00:00:00', 'updated_at' => '0000-00-00 00:00:00'],
			['id' => '3', 'mixture_dev_id' => '10', 'availability_id' => '1', 'minitext_id' => '1', 'mixture_item_id' => NULL, 'endtime' => '2014-09-30', 'bonus_title' => 'title', 'bonus_text' => 'text', 'created_at' => '0000-00-00 00:00:00', 'updated_at' => '0000-00-00 00:00:00'],
		];

		foreach ($akce_template as $row) {
			DB::table('akce_template')->insert([
				'id'              => $row['id'],
				'mixture_dev_id'  => $row['mixture_dev_id'],
				'availability_id' => $row['availability_id'],
				'minitext_id'     => $row['minitext_id'],
				'mixture_item_id' => $row['mixture_item_id'],
				'endtime'         => $row['endtime'],
				'bonus_title'     => $row['bonus_title'],
				'bonus_text'      => $row['bonus_text'],
				'created_at'      => $row['created_at'],
				'updated_at'      => $row['updated_at']
			]);
		}
	}
}