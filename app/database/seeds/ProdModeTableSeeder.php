<?php

class ProdModeTableSeeder extends Seeder {

	public function run()
	{
        DB::table('prod_mode')->delete();

        DB::table('prod_mode')->insert(array(
            'id' => 1,
            'visible' => 1,
            'name' => 'Skryté',
            'message' => 'Prodej byl již ukončen!',
        ));

        DB::table('prod_mode')->insert(array(
            'id' => 2,
            'visible' => 0,
            'name' => 'Nezahájeno',
            'message' => 'Prodej nebyl zatím zahájen!',
        ));

        DB::table('prod_mode')->insert(array(
            'id' => 3,
            'visible' => 1,
            'name' => 'Běžné zboží'
        ));

        DB::table('prod_mode')->insert(array(
            'id' => 4,
            'visible' => 1,
            'name' => 'AKCE'
        ));
	}
}
