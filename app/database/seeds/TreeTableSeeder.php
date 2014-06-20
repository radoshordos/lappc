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
            'relative' => 'root-naradi-nastroje'
        ));

        DB::table('tree')->insert(array(
            'id' => 22000000,
            'parent_id' => 22000000,
            'group_id' => 22,
            'position' => 0,
            'name' => 'Root | Zahradní technika',
            'desc' => 'Root | Zahradní technika',
            'relative' => 'root-zahradni-technika'
        ));

        DB::table('tree')->insert(array(
            'id' => 23000000,
            'parent_id' => 23000000,
            'group_id' => 23,
            'position' => 0,
            'name' => 'Root | Příslušenství',
            'desc' => 'Root | Příslušenství',
            'relative' => 'root-prislusenstvi'
        ));

        DB::table('tree')->insert(array(
            'id' => 21020000,
            'parent_id' => 21000000,
            'group_id' => 21,
            'position' => 2,
            'name' => 'Akumulátorové nářadí',
            'desc' => 'Akumulátorové nářadí',
            'relative' => 'akumulatorove-naradi'
        ));

        DB::table('tree')->insert(array(
            'id' => 21020200,
            'parent_id' => 21020000,
            'group_id' => 21,
            'position' => 2,
            'name' => 'Aku šroubováky',
            'desc' => 'Aku šroubováky',
            'relative' => 'aku-sroubovaky'
        ));

        DB::table('tree')->insert(array(
            'id' => 21020400,
            'parent_id' => 21020000,
            'group_id' => 21,
            'position' => 4,
            'name' => 'Aku úhlové vrtačky',
            'desc' => 'Aku úhlové vrtačky',
            'relative' => 'aku-uhlove-vrtacky'
        ));
	}
}

