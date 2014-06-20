<?php

class TreeTableSeeder extends Seeder {

	public function run()
	{

        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('tree')->delete();

        DB::table('tree')->insert(array(
            'id' => 1,
            'parent_id' => 1,
            'group_id' => 1,
            'name' => 'Root',
            'desc' => 'Root',
            'relative' => 'root'
        ));

        DB::table('tree')->insert(array(
            'id' => 21100000,
            'parent_id' => 1,
            'group_id' => 21,
            'name' => 'Akumulátorové nářadí',
            'desc' => 'Akumulátorové nářadí',
            'relative' => 'akumulatorove-naradi'
        ));

        DB::table('tree')->insert(array(
            'id' => 21100200,
            'parent_id' => 21100000,
            'group_id' => 21,
            'name' => 'Aku šroubováky',
            'desc' => 'Aku šroubováky',
            'relative' => 'aku-sroubovaky'
        ));

        DB::table('tree')->insert(array(
            'id' => 21100400,
            'parent_id' => 21100000,
            'group_id' => 21,
            'name' => 'Aku úhlové vrtačky',
            'desc' => 'Aku úhlové vrtačky',
            'relative' => 'aku-uhlove-vrtacky'
        ));

        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
	}
}

