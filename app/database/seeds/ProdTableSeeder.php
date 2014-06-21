<?php


class ProdTableSeeder extends Seeder {

	public function run()
	{
        DB::table('prod')->delete();

        DB::table('prod')->insert(array(
            'tree_id' => 21020200,
            'dev_id' => 5,
            'warranty_id' => 1,
            'price' => 2000,
            'alias' => 'pokus',
            'name' => 'Pokus',
            'desc' => 'Skutečně pokus',
        ));
	}
}

