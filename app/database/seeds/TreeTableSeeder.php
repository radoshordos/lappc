<?php

class TreeTableSeeder extends Seeder {

	public function run()
	{
        DB::table('tree')->delete();

        DB::table('tree')->insert(array(
            'id' => 21000000,
            'parent_id' => 21000000,
            'group_id' => 21,
            'position' => 0,
            'name' => 'Root | Nářadí, nástroje',
            'desc' => 'Root | Nářadí, nástroje',
            'relative' => '',
            'absolute' => ''
        ));

        DB::table('tree')->insert(array(
            'id' => 22000000,
            'parent_id' => 22000000,
            'group_id' => 22,
            'position' => 0,
            'name' => 'Root | Zahradní technika',
            'desc' => 'Root | Zahradní technika',
            'relative' => '',
            'absolute' => ''
        ));

        DB::table('tree')->insert(array(
            'id' => 23000000,
            'parent_id' => 23000000,
            'group_id' => 23,
            'position' => 0,
            'name' => 'Root | Příslušenství',
            'desc' => 'Root | Příslušenství',
            'relative' => '',
            'absolute' => ''
        ));

        DB::table('tree')->insert(array(
            'id' => 21020000,
            'parent_id' => 21000000,
            'group_id' => 21,
            'position' => 2,
            'name' => 'Akumulátorové nářadí',
            'desc' => 'Akumulátorové nářadí',
            'relative' => 'akumulatorove-naradi',
            'absolute' => 'akumulatorove-naradi'
        ));

        DB::table('tree')->insert(array(
            'id' => 21020200,
            'parent_id' => 21020000,
            'group_id' => 21,
            'position' => 2,
            'name' => 'Aku šroubováky',
            'desc' => 'Aku šroubováky',
            'relative' => 'aku-sroubovaky',
            'absolute' => 'akumulatorove-naradi/aku-sroubovaky'
        ));

        DB::table('tree')->insert(array(
            'id' => 21020400,
            'parent_id' => 21020000,
            'group_id' => 21,
            'position' => 4,
            'name' => 'Aku úhlové vrtačky',
            'desc' => 'Aku úhlové vrtačky',
            'relative' => 'aku-uhlove-vrtacky',
            'absolute' => 'akumulatorove-naradi/aku-uhlove-vrtacky'
        ));

        DB::table('tree')->insert(array(
            'id' => 21020600,
            'parent_id' => 21020000,
            'group_id' => 21,
            'position' => 4,
            'name' => 'Aku brusky',
            'desc' => 'Akumulátorové brusky',
            'relative' => 'aku-uhlove-vrtacky',
            'absolute' => 'akumulatorove-naradi/aku-uhlove-vrtacky'
        ));

        DB::statement('CALL proc_tree_recalculate');
	}
}

