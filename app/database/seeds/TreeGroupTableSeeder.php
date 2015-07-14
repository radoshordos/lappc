<?php

class TreeGroupTableSeeder extends Seeder
{

	public function run()
	{
		DB::table('tree')->delete();
		DB::table('tree_group')->delete();

		DB::table('tree_group')->insert([
			'id'          => 1,
			'grouptop_id' => 1,
			'type'        => 'null',
			'name'        => '[NULL]'
		]);

		DB::table('tree_group')->insert([
			'id'          => 10,
			'grouptop_id' => 10,
			'type'        => 'homepage',
			'name'        => 'Úvodní strana'
		]);

		DB::table('tree_group')->insert([
			'id'          => 15,
			'grouptop_id' => 20,
			'type'        => 'prodfind',
			'name'        => 'Vyhledánání'
		]);

		DB::table('tree_group')->insert([
			'id'          => 16,
			'grouptop_id' => 20,
			'type'        => 'prodaction',
			'name'        => 'Akce'
		]);

		DB::table('tree_group')->insert([
			'id'          => 17,
			'grouptop_id' => 20,
			'type'        => 'prodaction',
			'name'        => 'Výprodej'
		]);

		DB::table('tree_group')->insert([
			'id'          => 19,
			'grouptop_id' => 20,
			'type'        => 'prodnew',
			'name'        => 'Novinky'
		]);

		DB::table('tree_group')->insert([
			'id'          => 21,
			'grouptop_id' => 20,
			'for_prod'    => 1,
			'type'        => 'prodlist',
			'name'        => 'Akumulátorové nářadí'
		]);

		DB::table('tree_group')->insert([
			'id'          => 22,
			'grouptop_id' => 20,
			'for_prod'    => 1,
			'type'        => 'prodlist',
			'name'        => 'Elektrické nářadí'
		]);

		DB::table('tree_group')->insert([
			'id'          => 23,
			'grouptop_id' => 20,
			'for_prod'    => 1,
			'type'        => 'prodlist',
			'name'        => 'Pneu nářadí'
		]);

		DB::table('tree_group')->insert([
			'id'          => 24,
			'grouptop_id' => 20,
			'for_prod'    => 1,
			'type'        => 'prodlist',
			'name'        => 'Ruční nářadí'
		]);

		DB::table('tree_group')->insert([
			'id'          => 25,
			'grouptop_id' => 20,
			'for_prod'    => 1,
			'type'        => 'prodlist',
			'name'        => 'Zahradní vybavení'
		]);

		DB::table('tree_group')->insert([
			'id'          => 26,
			'grouptop_id' => 20,
			'for_prod'    => 1,
			'type'        => 'prodlist',
			'name'        => 'Měřící technika'
		]);

		DB::table('tree_group')->insert([
			'id'          => 27,
			'grouptop_id' => 20,
			'for_prod'    => 1,
			'type'        => 'prodlist',
			'name'        => 'Dřevoobráběcí stroje'
		]);

		DB::table('tree_group')->insert([
			'id'          => 28,
			'grouptop_id' => 20,
			'for_prod'    => 1,
			'type'        => 'prodlist',
			'name'        => 'Kovoobráběcí stroje'
		]);

		DB::table('tree_group')->insert([
			'id'          => 29,
			'grouptop_id' => 20,
			'for_prod'    => 1,
			'type'        => 'prodlist',
			'name'        => 'Dílenské vybavení'
		]);

		DB::table('tree_group')->insert([
			'id'          => 30,
			'grouptop_id' => 20,
			'for_prod'    => 1,
			'type'        => 'prodlist',
			'name'        => 'Stavební mechanizace'
		]);

		DB::table('tree_group')->insert([
			'id'          => 32,
			'grouptop_id' => 20,
			'for_prod'    => 1,
			'type'        => 'prodlist',
			'name'        => 'Příslušenství'
		]);

		DB::table('tree_group')->insert([
			'id'          => 35,
			'grouptop_id' => 20,
			'type'        => 'prodhelpless',
			'name'        => 'Zboží samostatně neprodejné'
		]);

		DB::table('tree_group')->insert([
			'id'          => 51,
			'grouptop_id' => 50,
			'type'        => 'text',
			'name'        => 'Text'
		]);

		DB::table('tree_group')->insert([
			'id'          => 52,
			'grouptop_id' => 50,
			'type'        => 'textdev',
			'name'        => 'Text o výrobcích'
		]);

		DB::table('tree_group')->insert([
			'id'          => 81,
			'grouptop_id' => 80,
			'type'        => 'textrules',
			'name'        => 'Mapa webu'
		]);

		DB::table('tree_group')->insert([
			'id'          => 91,
			'grouptop_id' => 90,
			'type'        => 'buybox',
			'name'        => 'Nákupní košík'
		]);
	}

}